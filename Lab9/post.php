<?php include_once 'config.php';
include 'func/postmanager.php';
include 'includes/header.php';
include 'func/functions.php';
if (isset($_GET['id']))
{
    $post = getPost($_GET['id'], $conn);
    $theid = $_GET['id'];
    $comments = new Comment($theid, $conn);
    $comments->getComments();
    $replies = new Reply($theid, $conn);
    $replies->getReplies();
    $reviews = new Review($conn);
    $reviews->post_id = $theid;
    $reviews->getReviews();
}
?>

        <hr>
        <div class="container post">
            <div class="row">
                <?php if ($post == false): ?>
                    <h2 class="display-4">Error 404: post not found!</h2>
                <?php else: ?>
                    <div class="col-md-8 offset-md-2">
                        <img src="<?php echo $post['post_img']; ?>" class="img-fluid" alt="">
                        <h2 class="font-weight-light mt-4"><?php echo htmlspecialchars($post['post_title']); ?></h2>
                        <h5><em><?php echo htmlspecialchars($post['date_created']); ?></em></h5>
                        <p><?php echo htmlspecialchars($post['post_body']) ?></p>
                    </div>
                <?php endif; ?>
            </div> <!-- End of post row -->
            <!-- Comment row -->
            <?php include 'includes/comments.php'; ?>
        </div>
        <hr>

<?php
var_dump($_SESSION);
include 'includes/footer.php';
?>