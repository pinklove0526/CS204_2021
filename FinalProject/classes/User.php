<?php
class User
{
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_hash;
    public $user_password;
    public $user_password2;
    public $conn;
    public $user = [];
    public $users = [];
    public $errors = [];

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUsername()
    {
        $sql = "select * from users where User_name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->user_name);
        $stmt->execute();
        $results = $stmt->get_result();
        if ($results->num_rows == 1)
            $this->user = $results->fetch_assoc();
    }

    public function checkNewUser($user_name, $user_email, $user_password)
    {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
        $this->getUsername();
        if (!empty($this->user))
            $this->errors['signup'] = "This username is already taken!";
        if (empty($this->user_name))
            $this->errors['signup_username'] = "Username cannot be void!";
        if (!filter_var($this->user_email, FILTER_VALIDATE_EMAIL))
            $this->errors['signup_email'] = "This email is invalid!";
        if (strlen($this->user_password) < 5 || $this->user_password != $user_password2)
            $this->errors['signup_password'] = "Passwords must match and be more than 5 characters in length!";
        if (empty($this->errors))
            $this->createAccount();
    }

    public function createAccount()
    {
        $this->user_hash = password_hash($this->user_password, PASSWORD_DEFAULT);
        $sql = "insert into users (User_name, Email, hash) values (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $this->user_name, $this->user_email, $this->user_hash);
        $stmt->execute();
        if ($stmt->affected_rows == 1)
        {
            $this->getUsername();
            $this->login();
        }
    }

    public function checkLogin($user_name, $password)
    {
        $this->user_name = $user_name;
        $this->user_password = $password;
        $this->getUsername();
        if (!empty($this->user))
        {
            if (password_verify($this->user_password, $this->user['hash']))
                $this->login();
            else
                $this->errors['login_password'] = "Incorrect password!";
        }
        else
            $this->errors['login_username'] = "This username does not exist!";
    }

    public function login()
    {
        $_SESSION['user_id'] = $this->user['ID'];
        $_SESSION['user_name'] = $this->user['User_name'];
        $_SESSION['loggedin'] = true;
        header("Location: index.php?login=success");
    }

    public static function logout()
    {
        $_SESSION = [];
        session_destroy();
        header("Location: index.php?logout");
    }
}
?>