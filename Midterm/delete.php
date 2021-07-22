<?php include 'includes/header.php';
include 'db.php';
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "delete from planets where ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
$location = "Location: index.php";
header($location);
?>