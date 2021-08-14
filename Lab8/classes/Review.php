<?php
class Review
{
    public $review_value;
    public $review_type;
    public $comment_id;
    public $user_id;
    public $post_id;
    public $review_id;
    public $review = [];
    public $reviews = [];
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function setReviewProperties($review_value, $review_type, $comment_id)
    {
        $this->review_type = $review_type;
        $this->review_value = $review_value;
        $this->comment_id = $comment_id;
        $this->user_id = $_SESSION['user_id'];
        $post_id = explode("=", $_SESSION['query_history'][4]);
        $this->post_id = $post_id[1];
    }

    public function createReview()
    {
        $sql = "select * from reviews where user_id = ? and comment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $this->user_id, $this->comment_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1)
            $this->updateReview();
        else
        {
            $sql = "insert into reviews (review_value, user_id, comment_id, post_id) values (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iiii", $this->review_value, $this->user_id, $this->comment_id, $this->post_id);
            $stmt->execute();
            $response = ["review" => "new", "affected_rows" => $stmt->affected_rows];
            echo json_encode($response);
        }
    }

    public function updateReview()
    {
        $sql = "UPDATE reviews SET review_value = ? where user_id = ? and comment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $this->review_value, $this->user_id, $this->comment_id);
        $stmt->execute();
        $response = ["review" => "updated", "affected_rows" => $stmt->affected_rows];
        echo json_encode($response);
    }

    public function getReviews()
    {
        $sql = "select SUM(review_value = 1) as thumbs_down, SUM(review_value = 2) as thumbs_up, comment_id, SUM(case when user_id = ? then 1 else 0 end) as user_reviewed, SUM(case when user_id = ? then review_value else 0 end) as user_reviewed_value from reviews where post_id = ? group by comment_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $_SESSION['user_id'], $_SESSION['user_id'], $this->post_id);
        $stmt->execute();
        $results = $stmt->get_result();
        $this->reviews = $results->fetch_all(MYSQLI_ASSOC);
    }
}
?>