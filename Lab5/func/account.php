<?php
$errors = [];
if (isset($_POST['login']))
    checkLogin($_POST, $errors, $conn);
elseif (isset($_POST['create']))
    checkCreate($_POST, $errors, $conn);
function checkLogin($post, &$errors, $conn)
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    if (checkForUser($name, $conn) != 1)
    {
        $errorMsg = "Username not found!";
        $errors['login_username'] = $errorMsg;
    }
    else
    {
        $user_row = getUserRow($name, $conn);
        if (!password_verify($password, $user_row['user_hash']))
        {
            $errorMsg = "Incorrect password!";
            $errors['login_password'] = $errorMsg;
        }
    }
    if (empty($errors))
        loginUser($user_row['user_name'], $user_row['ID'], $user_row['user_role']);
}
function checkCreate($post, &$errors, $conn)
{
    $username = $post['username'];
    $email = $post['email'];
    $password1 = $post['password1'];
    $password2 = $post['password2'];
    if (!minmaxChars($username, 5, 20))
    {
        $errorMsg = "Username must be between 5 - 20 characters long!";
        $errors['create_username'] = $errorMsg;
    }
    elseif (checkForUser($username, $conn) == 1)
    {
        $errorMsg = "Username already taken!";
        $errors['create_username'] = $errorMsg;
    }
    if (!minmaxChars($password1, 5) || $password1 != $password2)
    {
        $errorMsg = "Password is too short or does not match!";
        $errors['create_password'] = $errorMsg;
    }
    if (empty($errors))
    {
        $user_id = createUser($conn, $username, $email, $password1);
        if ($user_id != 0)
            loginUser($username, $user_id, 2);
    }
}
function checkForUser($username, $conn)
{
    $sql = "select * from users where user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->num_rows;
}
function getUserRow($username, $conn)
{
    $sql = "select * from users where user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_assoc();
}
function createUser($conn, $user_name, $user_email, $user_password)
{
    $user_hash = password_hash($user_password, PASSWORD_DEFAULT);
    $sql = "insert into users (user_name, user_email, user_hash) values (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user_name, $user_email, $user_hash);
    $stmt->execute();
    if ($stmt->affected_rows == 1)
        return $stmt->insert_id;
    else
        return 0;
}
function minmaxChars($string, $min, $max = 1000)
{
    if (strlen($string) < $min || strlen($string) > $max)
        return false;
    else
        return true;
}
function loginUser($user_name, $user_id, $user_role)
{
    $_SESSION['loggedin'] = true;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_role'] = $user_role;
    header("Location: index.php?login=success");
}
?>