<?php
class Comment
{
    public $comment_text;
    public $comment_id;
    public $comment_user_id;
    public $comment_user_name;
    public $comment_post_id;
    public $comment_date_created;
    public $comment = [];
    public $comments = [];
    public $conn;

    public function __construct($post_id, $conn)
    {
        $this->comment_post_id = $post_id;
        $this->conn = $conn;
    }

    public function getComments()
    {
        $sql = "select c.ID as CID, u.ID as UID, c.comment_text, c.date_created, u.user_name, c.comment_user from comments c join users u on u.ID = c.comment_user where c.comment_post = ? and c.comment_parent is null order by date_created desc";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->comment_post_id);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->comments = $results->fetch_all(MYSQLI_ASSOC);
    }

    public function createComment()
    {
        $sql = "insert into comments (comment_text, comment_user, comment_post) values (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sii", $this->comment_text, $_SESSION['user_id'], $this->comment_post_id);
        $stmt->execute();
        if ($stmt->affected_rows == 1)
        {
            $this->comment_id = $stmt->insert_id;
            $this->getComment();
        }
    }

    public function getComment()
    {
        $sql = "select c.ID as comment_id, c.comment_text, c.date_created, u.user_name, c.comment_user from comments c join users u on u.ID = c.comment_user where c.ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->comment_id);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->comment = $results->fetch_assoc();
    }

    public function deleteComment($comment_id)
    {
        $this->comment_id = $comment_id;
        $this->getComment();
        $_SESSION['comment'] = $this->comment;
        if ($this->comment['comment_user'] == $_SESSION['user_id'] || $_SESSION['user_role'] == 1)
        {
            $this->comment_id = $comment_id;
            $sql = "delete from comments where ID = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $this->comment_id);
            $stmt->execute();
            if ($stmt->affected_rows == 1)
                echo true;
            else
                echo false;
        }
        else
            echo false;
    }

    public function updateComment() {}
}
?>