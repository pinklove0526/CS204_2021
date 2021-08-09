<?php
include '../config.php';
include '../classes/Comment.php';
include '../classes/Reply.php';
include '../classes/Review.php';
if (isset($_POST['comment']))
{
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['comment'];
    $comment = new Comment($post_id, $conn);
    $comment->comment_text = $comment_text;
    $comment->createComment();
    echo json_encode($comment->comment);
}
if (isset($_POST['delete-comment']))
{
    $comment_id = $_POST['comment_id'];
    $post_id = $_SESSION['query_history'];
    $comment = new Comment($post_id[3], $conn);
    $comment->deleteComment($comment_id);
}
if (isset($_POST['reply-comment']))
{
    $reply_to_comment_id = $_POST['comment_id'];
    $post_id = $_SESSION['query_history'][3];
    $post_id = explode("=", $post_id);
    $reply_user_id = $_POST['reply_user_id'];
    $comment_text = $_POST['comment_text'];
    $reply = new Reply($post_id[1], $conn);
    $reply->setReplyDetails($reply_to_comment_id, $reply_user_id, $comment_text);
    $reply->createReply();
    echo json_encode($reply->comment);
}
if (isset($_POST['review_value']))
{
    $review_value = $_POST['review_value'];
    $review_type = $_POST['review_type'];
    $comment_id = $_POST['comment_id'];
    $review = new Review($conn);
    $review->setReviewProperties($review_value, $review_type, $comment_id);
    $review->createReview();
}
?>