<?php include 'db.php';
$num_rows = 0;
if (isset($_GET['author']))
{
    $author = $_GET['author'];
    $sql = "select wpu.ID as author_id, wpp.ID, wpp.post_date, wpp.post_title, wpp.post_content, wpu.user_nicename from wp_posts wpp join wp_users wpu on wpu.ID = wpp.post_author where wpu.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $author);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows != 0)
    {
        $num_rows = $result->num_rows;
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $author = $rows[0]['user_nicename'];
    }
}
else
{
    //Output error - author not found
}
?>

        <div class="jumbotron jumbotron-fluid article">
            <div class="container">
                <button type="button" class="btn btn-outline-light"><a href='index.php'>< Back</a></button>
                <?php if ($num_rows != 0): ?>
                    <h1 class="display-3"><?php echo $author; ?></h1>
                <?php else: ?>
                    <h1>Author not found!</h1>
                <?php endif; ?>
            </div>
        </div>
        <div class="container recent-articles">
            <div class="row">
                <?php
                    if ($num_rows == 0)
                        echo "<h3 class='mb-5'>No results found. Try again...</h3>";
                    else
                    {
                        foreach ($rows as $row)
                        {
                            $post = filter_var(substr($row['post_content'], 0, 55), FILTER_SANITIZE_STRING);
                            echo "<div class='col-md-6'>
                            <h3><a href='article.php?id={$row['ID']}'>{$row['post_title']}</a></h3>
                            <p>{$post}...</p></div>";
                        }
                    }
                ?>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>