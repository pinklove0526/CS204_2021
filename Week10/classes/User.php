<?php
class User
{
    public $user_id;
    public $user_name;
    public $user_role;
    public $user_password;
    public $user_hash;
    public $user_email;
    public $conn;
    public $user = [];
    public $users = [];

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUser() {}

    public function getUsers() {}

    public function loginUser() {}

    public function createUser() {}

    public function getUser() {}
}
?>