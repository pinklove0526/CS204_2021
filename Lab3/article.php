<?php include 'db.php';
$num_rows = 0;
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "select wpu.ID as author_id, wpp.post_date, wpp.post_title, wpp.post_content, wpu.user_nicename, wpp.ID from wp_posts wpp join wp_users wpu on wpu.ID = wpp.post_author where wpp.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows != 0)
    {
        $num_rows = $result->num_rows;
        $row = $result->fetch_assoc();
        $title = $row['post_title'];
        $date = date_create($row['post_date']);
        $body = $row['post_content'];
        $author = $row['user_nicename'];
        $author_id = $row['author_id'];
        $id = $row['ID'];
    }
}
else
{
    //Output error - article not found
}
include 'includes/header.php';
?>

        <div class="jumbotron jumbotron-fluid article">
            <div class="container">
                <button type="button" class="btn btn-outline-light"><a href='index.php'>< Back</a></button>
                <?php if ($num_rows != 0): ?>
                    <h1 class="display-3"> <?php echo $title; ?></h1>
                    <h3>Author: <a href="author.php?author=<?php echo $author_id; ?>"> <?php echo $author; ?></a></h3>
                    <h5 class="font-weight-light"><em><?php echo date_format($date, "Y/m/d"); ?></em></h5>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="container recent-articles">
            <?php if (isset($_GET['new'])): ?>
                <div class="alert alert-success" role="alert">You created a new post successfully!</div>
            <?php elseif (isset($_GET['update'])): ?>
                <div class="alert alert-warning" role="alert">You have updated the post successfully!</div>
            <?php endif; ?>
            <div class="row"><?php if ($num_rows != 0) echo $body; ?></div>
            <?php
                if ($num_rows != 0)
                {
                    echo "<button class='btn mt-5 btn-outline-warning'>
                    <a href='edit.php?id={$id}'>Edit</a></button>";
                    echo "<button class='float-right btn mt-5 btn-outline-danger'>
                    <a href='delete.php?id={$id}'>Delete</a></button>";
                }
            ?>
        </div>

<?php include 'includes/footer.php'; ?>