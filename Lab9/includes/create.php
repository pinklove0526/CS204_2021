<?php include 'db.php';
include 'includes/header.php';
if (isset($_POST['submit']))
{
    $title = $_POST['title'];
    $body = $_POST['body'];
    $date = date("Y-m-d H:i:s");
    $user = 1;
    $stmt = $conn->prepare("insert into wp_posts (post_title, post_content, post_author, post_date) values (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $title, $body, $user, $date);
    $stmt->execute();
    if ($stmt->affected_rows == 1)
    {
        $id = $stmt->insert_id;
        $location = "Location: article.php?id={$id}&new=true";
        header($location);
    }
}
?>

        <div class="container">
            <h2 class="display-4">Create a new post...</h2>
            <div class="row">
                <form class="" action="create.php" method="POST">
                    <label for="title">Post title</label>
                    <input type="text" name="title" class="form-control" value="">
                    <label for="body">Post content</label>
                    <textarea name="body" class="form-control" cols="80" rows="8"></textarea>
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mt-4">Create post</button>
                </form>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>