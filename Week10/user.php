<?php
include_once 'config.php';
include 'func/functions.php';
include 'func/postmanager.php';
include 'classes/Comment.php';
include 'classes/Reply.php';
include 'classes/Review.php';
include 'includes/heaer.php';
?>

        <?php if (!$_SESSION['loggedin']): ?>
            <?php include 'includes/require_login.php'; ?>
        <?php else: ?>
            <div class="container-fluid user-profile">
                <?php
                    include 'includes/user_nav.php';
                    if (empty($_GET) || isset($_GET['profile']))
                        include 'includes/user_profile.php';
                ?>
            </div>
        <?php endif; ?>

<?php include 'includes/footer.php'; ?>