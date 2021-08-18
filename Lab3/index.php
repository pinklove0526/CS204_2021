<?php include 'db.php';
$results = $conn->query("select * from wp_posts order by post_date desc limit 12");
$rows = $results->fetch_all(MYSQLI_ASSOC);
include 'includes/header.php';
?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">MySQLi Connect</h1>
                <p class="lead">Query the WordPress database using MySQLi</p>
                <form class="" action="search.php" method="POST">
                    <input type="text" name="search" class="form-control mt-4 mb-4" placeholder="Search the database..." value="">
                    <button type="submit" class="btn btn-outline-primary" name="submit">Search database</button>
                </form>
            </div>
        </div>
        <div class="container recent-articles">
            <?php if (isset($_GET['delete'])): ?>
                <div class="alert alert-danger" role="alert">Article deleted!</div>
            <?php endif; ?>
            <h2 class="font-weight-light">Recent articles</h2>
            <hr>
            <div class="row">
                <?php
                    foreach ($rows as $row)
                    {
                        $post = filter_var(substr($row['post_content'], 0, 55), FILTER_SANITIZE_STRING);
                        echo "<div class='col-md-6'>
                        <h3><a href='article.php?id={$row['ID']}'>{$row['post_title']}</a></h3>
                        <p>{$post}...</p></div>";
                    }
                ?>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>