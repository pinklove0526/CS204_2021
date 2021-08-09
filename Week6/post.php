<?php include 'func/config.php';
include 'includes/header.php';
if (isset($_GET['id']))
{
    $sql = "select post_title, post_img, post_body, posts.date_created, users.user_name, users.ID as author_id, posts.ID from posts join users on users.ID = posts.post_author where posts.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows == 1)
    {
        $row = $results->fetch_assoc();
        $title = $row['post_title'];
        $body = $row['post_body'];
        $author_id = $row['author_id'];
        $author = $row['user_name'];
        $date = $row['date_created'];
        $img = $row['post_img'];
    }
    else
        $errorMsg = "Post not found!";
}
echo $img;
?>

        <div class="jumbotron"
        <?php if (isset($img) && $img != ''): ?>
            style='background: url(<?php echo $img; ?>);'
        <?php endif; ?>>
            <div class="container text-white">
                <?php if (isset($title)): ?>
                    <h1 class="display-3"><?php echo htmlspecialchars($title); ?></h1>
                    <p class="lead"><?php echo htmlspecialchars($date); ?></p>
                    <p class="lead"><a href="user.php?id=<?php echo htmlspecialchars($author_id); ?>"><?php echo htmlspecialchars($author); ?></a></p>
                <?php else: ?>
                    <h1 class="display-3"><?php echo $errorMsg; ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <div class="container">
            <?php if (isset($_GET['created'])): ?>
                <div class="alert alert-success" role="alert">Your post was successfully created!</div>
            <?php endif; ?>
            <div class="row">
                <p>
                    <?php if (isset($body)): ?>
                        <?php echo htmlspecialchars($body); ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>