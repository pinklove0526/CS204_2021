<?php include_once 'config.php';
include 'func/functions.php';
include 'func/postmanager.php';
include 'includes/header.php';
if (isset($_SESSION['user_id']))
{
    $user = new User($conn);
    $user->user_id = $_SESSION['user_id'];
    $user->getUser();
}
?>

        <?php if (!$_SESSION['loggedin']): ?>
            <?php include 'includes/require_login.php'; ?>
        <?php else: ?>
            <div class="container-fluid user-profile">
                <div class="row">
                    <?php
                        include 'includes/user_nav.php';
                        if (empty($_GET) || isset($_GET['profile']))
                            include 'includes/user_profile.php';
                        elseif (isset($_GET['posts']))
                            include 'includes/user_posts.php';
                    ?>
                </div>
            </div>
        <?php endif; ?>

<?php include 'includes/footer.php'; ?>