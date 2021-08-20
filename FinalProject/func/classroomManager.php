<?php
function checkClassroom($class_name, $class_type, $info, &$errors)
{
    if ($class_name == '' || $class_type == '' || $info == '')
        $errors['text'] = "You must fill in all fields!";
}
function createClassroom($class_name, $class_type, $info, $video_path, $conn)
{
    $sql = "insert into classroom (class_name, class_type, info, video) values (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $class_name, $class_type, $info, $video);
    $stmt->execute();
    if ($stmt->affected_rows == 1)
    {
        $location = "Location: all.php?success";
        header($location);
    }
}
function getClassroom($id, $conn)
{
    $sql = "select * from classroom where class_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1)
        return $result->fetch_assoc();
    else
        return false;
}
function getClassrooms($limit, $conn, $offset = 0)
{
    $sql = "select * from classroom limit ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_all(MYSQLI_ASSOC);
}
function outputClassrooms($classrooms)
{
    $output = '';
    foreach ($classrooms as $classroom)
        $output .= "<div class='col-md-4 p-3'>
        <div class='card text-center rounded' style='border-radius: 20px; border-color: gray;'>
        <h3><a href='post.php?id={$classroom['class_id']}'>{$classroom['class_name']}</a></h3>
        <p>{$classroom['info']}</p>
        <video width='360' height='200' controls><source src='{$classroom['video']}' type='video/mp4'></video>
        </div></div>";
    echo $output;
}
function getMartialArts($limit, $conn, $offset = 0)
{
    $sql = "select * from classroom where class_type = 'martial arts' limit ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_all(MYSQLI_ASSOC);
}
function getTalents($limit, $conn, $offset = 0)
{
    $sql = "select * from classroom where class_type = 'talents' limit ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_all(MYSQLI_ASSOC);
}
function getSurvivalSkills($limit, $conn, $offset = 0)
{
    $sql = "select * from classroom where class_type = 'survival skills' limit ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_all(MYSQLI_ASSOC);
}
function getBasicSkills($limit, $conn, $offset = 0)
{
    $sql = "select * from classroom where class_type = 'basic skills' limit ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_all(MYSQLI_ASSOC);
}
function getArts($limit, $conn, $offset = 0)
{
    $sql = "select * from classroom where class_type = 'arts' limit ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_all(MYSQLI_ASSOC);
}
?>