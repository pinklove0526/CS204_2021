<?php include 'db.php';
$num_rows = 0;
if (isset($_POST['submit']))
{
    $search = $_POST['search'];
    $search_term = "%{$search}%";
    $stmt = $conn->prepare("select ID, post_title, post_date, post_content from wp_posts where post_title like ?");
    $stmt->bind_param("s", $search_term);
    $stmt->execute();
    $results = $stmt->get_result();
    $num_rows = $results->num_rows;
    $rows = $results->fetch_all(MYSQLI_ASSOC);
}
include 'includes/header.php';
?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Number of results: <?php echo $num_rows; ?></h1>
                <p class="lead">Search again...</p>
                <form class="" action="search.php" method="POST">
                    <input type="text" name="search" class="form-control mt-4 mb-4" placeholder="Search the database..." value="">
                    <button type="submit" class="btn btn-outline-primary" name="submit">Search database</button>
                </form>
            </div>
        </div>
        <div class="container front recent-articles">
            <div class="row">
                <?php
                    if ($num_rows == 0)
                        echo "<h3 class='mb-5'>No results found, try again...</h3>";
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