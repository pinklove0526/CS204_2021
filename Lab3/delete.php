<?php include 'db.php';
include 'includes/header.php';
if (isset($_GET['id']))
    $id = $_GET['id'];
if (isset($_POST['delete']))
{
    $id = $_POST['delete'];
    $sql = "delete from wp_posts where ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    if ($stmt->affected_rows == 1)
    {
        $location = "Location: index.php?delete=true";
        header($location);
    }
}
?>

        <div class="jumbotron">
            <h1 class="display-3">Are you sure you want to delete?</h1>
            <form class="" action="delete.php" method="POST"><button type="submit" name="delete" value="<?php if (isset($id)) echo $id; ?>" class="btn mr-5 float-left btn-danger">Delete</button></form>
            <button type="submit" name="cancel" class="btn float-left btn-success"><a href="index.php">Cancel</a></button>
        </div>

<?php include 'includes/footer.php'; ?>