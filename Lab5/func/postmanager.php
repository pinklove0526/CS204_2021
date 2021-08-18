<?php
function checkPost($title, $body, $errors)
{
    if ($title == '' || $body == '')
        $errors['text'] = "You must fill in all fields!";
}
function createPost($title, $body, $img_path, $conn)
{
    $sql = "insert into posts (post_title, post_body, post_author, post_img) values (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $title, $body, $_SESSION['user_id'], $img_path);
    $stmt->execute();
    if ($stmt->affected_rows == 1)
    {
        $location = "Location: post.php?id=" . $stmt->insert_id . "&created=true";
        header($location);
    }
}
function getPost($id, $conn)
{
    $sql = "select * from posts where ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1)
        return $result->fetch_assoc();
    else
        return false;
}
function getPosts($limit, $offset, $conn) {}
function outputPosts($posts) {}
?>