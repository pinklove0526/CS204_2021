<?php include '../config.php';
include '../classes/Comment.php';
if (isset($_POST['submit']))
{
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['comment'];
    $comment = new Comment($post_id, $conn);
    $comment->createComment($comment_text);
    echo json_encode($comment->comment);
}
if (isset($_POST['delete-comment']))
{
    $comment_id = $_POST['comment_id'];
    $post_id = $_SESSION['query_history'];
    $comment = new Comment($post_id[3], $conn);
    $comment->deleteComment($comment_id);
}
?>