<?php
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['username'] = "jellyfishng";
include 'db.php';
include 'includes/header.php';
if (isset($_POST['submit']))
{
    $title = $_POST['title'];
    $body = $_POST['body'];
    $date = date("Y-m-d H:i:s");
    $user = $_SESSION['user'];
    $sql1 = "insert into wp_posts (post_author, post_date, post_content, post_title) values (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user, $date, $body, $title);
    $stmt->execute();
    var_dump($stmt);
}
?>

        <div class="container">
            <h2 class="display-4 mt-3 mb-3">Create a new post...</h2>
            <div class="row">
                <form class="" action="create.php" method="POST">
                    <label for="title">Post title</label>
                    <input type="text" name="title" class="form-control" placeholder="Post title..." value="">
                    <label for="body">Post content</label>
                    <textarea name="body" class="form-control" cols="80" rows="8"></textarea>
                    <button type="submit" class="btn mt-4 btn-block btn-outline-primary" name="submit">Create new post</button>
                </form>
                <?php
                    if (isset($_POST['submit']))
                    {
                        var_dump($_POST);
                        $_SESSION = [];
                        var_dump($_SESSION);
                    }
                ?>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>