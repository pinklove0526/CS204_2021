<?php
//User errors associative array to track errors and use as a bool. Decide on log in / creating account. Passed by reference
$errors = [];

if (isset($_POST['login']))
{
    //Process the login form, pass the post, errors (by reference) and database conn
    checkLogin($_POST, $errors, $conn);
}
elseif (isset($_POST['create']))
{
    //Process the create form, pass the post, errors (by reference) and database conn
    checkCreate($_POST, $errors, $conn);
}

//Check the login form for errors
function checkLogin($post, &$errors, $conn)
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    //Username checks, first check the database if the user exists. checkForUser() returns either 0 (doesn't exist) or the user ID
    if (checkForUser($name, $conn) != 1)
    {
        $errorMsg = "Username not found!";
        $errors['login_username'] = $errorMsg;
    }
    else
    {
        //If the user exists, get their record and check the user submitted password against the hash in the database
        $user_row = getUserRow($name, $conn);
        if (!password_verify($password, $user_row['user_hash']))
        {
            $errorMsg = "Incorrect password!";
            $errors['login_password'] = $errorMsg;
        }
    }
    //If there are no errors in the array then login and redirect
    if (empty($errors))
        loginUser($user_row['user_name'], $user_row['ID'], $user_row['user_role']);
}

//Checks the create new user form
function checkCreate($post, &$errors, $conn)
{
    $username = $post['username'];
    $email = $post['email'];
    $password1 = $post['password1'];
    $password2 = $post['password2'];
    //Check the username length, then ensure that the name doesn't exist in the database
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
    //Validate the email, should add sanitation as well
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errorMsg = "Invalid email!";
        $errors['create_email'] = $errorMsg;
    }
    //Check the password length and matching
    if (!minmaxChars($password1, 5) || $password1 != $password2)
    {
        $errorMsg = "Password is too short or does not match!";
        $errors['create_password'] = $errorMsg;
    }
    //If there are no errors, insert the user into the database and login
    if (empty($errors))
    {
        $user_id = createUser($conn, $username, $email, $password1);
        if ($user_id != 0)
            loginUser($username, $user_id, 2);
    }
}

//Query the database to see if a user exists, returns num_rows
function checkForUser($username, $conn)
{
    $sql = "select * from users where user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->num_rows;
}

//Fetch a user from the database based on the username
function getUserRow($username, $conn)
{
    $sql = "select * from users where user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_assoc();
}

//Inserts a new user into the database
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

//Character length checker
function minmaxChars($string, $min, $max = 1000)
{
    if (strlen($string) < $min || strlen($string) > $max)
        return false;
    else
        return true;
}

//loginUser() function, sets $_SESSION values and redirects to home
function loginUser($user_name, $user_id, $user_role)
{
    $_SESSION['loggedin'] = true;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_role'] = $user_role;
    header("Location: index.php?login=success");
}
?>