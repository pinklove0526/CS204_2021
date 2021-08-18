<?php include 'func/config.php';
include 'func/postmanager.php';
include 'func/filemanager.php';
$errors = [];
if (isset($_POST['submit']))
{
    $title = $_POST['title'];
    $body = $_POST['body'];
    checkPost($title, $body, $errors);
    $img_path = checkFile($_FILES, "image", $errors);
    if (empty($errors) && $img_path != false)
        createPost($title, $body, $img_path, $conn);
}
include 'includes/header.php';
?>

        <div class="container">
            <div class="row">
                <?php if ($_SESSION['loggedin'] == false): ?>
                    <div class="mt-5 col-md-6 offset-md-3 text-center">
                        <h2 class="display-5">Please login to post!</h2>
                        <p>Create an account or login to post to the website.</p>
                        <button type="button" class="btn btn-block btn-outline-primary"><a href="login.php"><ion-icon name="person-circle-outline"></ion-icon> Create account / login</a></button>
                    </div>
                <?php else: ?>
                    <div class="mt-3 col-md-6 offset-md-3">
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger" role="alert"><?php var_dump($errors); ?></div>
                        <?php endif; ?>
                        <h2>Create a post</h2>
                        <form class="" action="create.php" method="POST" enctype="multipart/form-data">
                            <label for="title">Post title</label>
                            <input type="text" name="title" placeholder="Post title..." value="" class="form-control">
                            <label for="body">Post content</label>
                            <textarea name="body" class="form-control" cols="80" rows="4"></textarea>
                            <input type="file" name="image" class="form-control mt-1 mb-1" value="">
                            <button type="submit" name="submit" class="btn btn-outline-dark btn-block"><ion-icon name="pencil-outline"></ion-icon> Create post</button>
                        </form>
                    </div>
                    <?php var_dump($GLOBALS); ?>
                <?php endif; ?>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>