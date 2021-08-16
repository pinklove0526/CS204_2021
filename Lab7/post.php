<?php include_once 'config.php';
include 'func/postmanager.php';
include 'classes/Comment.php';
include 'includes/header.php';
if (isset($_GET['id']))
{
    $post = getPost($_GET['id'], $conn);
    $theid = $_GET['id'];
    $comments = new Comment($theid, $conn);
    $comments->getComments();
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
                        <p><?php echo htmlspecialchars($post['post_body']); ?></p>
                    </div>
                    <hr>
                    <h3 class="display-4 mt-3 mb-3">Comments</h3>
                    <hr>
                    <div class="row comment-form">
                        <div class="col-md-8 form">
                            <?php if ($_SESSION['loggedin']): ?>
                                <form class="comment-form" action="func/ajaxmanager.php" method="POST">
                                    <textarea name="comment-text" class="form-control" cols="80" rows="4"></textarea>
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SERVER['QUERY_STRING']); ?>">
                                    <button type="submit" name="comment-submit" class="btn btn-outline-success mt-2"><ion-icon name="chatbubble-outline"></ion-icon> Add comment</button>
                                </form>
                            <?php else: ?>
                                <h3>Please login to comment!</h3>
                                <a href="login.php"><button type="button" class="btn btn-primary btn-lg">Login</button></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row comments"><?php $comments->outputComment(); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <hr>

<?php
$queryIDCount = count($_SESSION['query_history']) - 2;
$queryStrPos = strpos($_SESSION['query_history'][$queryIDCount], "id");
$queryId = substr($_SESSION['query_history'][$queryIDCount], $queryStrPos);
$queryId = explode("=", $queryId);
var_dump($_SESSION);
var_dump($GLOBALS);
include 'includes/footer.php';
?>