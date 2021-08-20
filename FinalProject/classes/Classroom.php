<?php
class Classroom
{
    public $class_id;
    public $info;
    public $class_name;
    public $user_id;
    public $video;
    public $file;
    public $type;
    public $conn;
    public $class_img;
    public $class_type;
    public $classroom = [];
    public $classrooms = [];
    public $errors = [];

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getClassroom()
    {
        $sql = "select * from classroom where class_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->class_name);
        $stmt->execute();
        $results = $stmt->get_result();
        if ($results->num_rows == 1)
            $this->class = $results->fetch_assoc();
    }

    public function getClassrooms($classid)
    {
        $this->user_id = $classid;
        $sql = "select * from classroom where class_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->class_id);
        $stmt->execute();
        $results = $stmt->get_result();
        if ($results->num_rows >= 1)
            $this->classes = $results->fetch_all(MYSQLI_ASSOC);
    }

    public function checkCreateClassroom($class_name, $class_type, $info, $errors)
    {
        $this->class_name = $class_name;
        $this->class_type = $class_type;
        $this->info = $info;
        $this->errors = $errors;
        $this->getClassroom();
        if (!empty($this->classroom))
            $this->errors['create-classroom'] = "This classname is already taken!";
        if ($class_name == '' || $class_type == '' || $info = '')
            $errors['text'] = "Must fill in all fields!";
    }

    public function createClassroom($class_name, $class_type, $info, $video)
    {
        $this->class_name = $class_name;
        $this->class_type = $class_type;
        $this->info = $info;
        $this->video = $video;
        $sql = "insert into classroom (class_type, info, class_name, video) values (?, ?, ?, ?)";
        $stmt = $this->$conn->prepare($sql);
        $stmt->bind_param("ssss", $this->class_type, $this->info, $this->class_name);
        $stmt->execute();
        if ($stmt->affected_rows == 1)
            header("Location: all.php?success");
    }

    public function deleteClass($id)
    {
        $this->getClassrooms($id);
        if ($this->class['creator_id'] == $_SESSION['user_id'])
        {
            $sql = "delete from classroom where class_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $this->class_id);
            $stmt->execute();
        }
    }

    public function checkFile($file, $type, &$errors, $maxsize = 524000000)
    {
        $this->file = $file;
        $this->type = $type;
        $this->errors = $errors;
        $file = $file['video'];
        $fname = $file['name'];
        $ftype = explode("/", $file['type']);
        $tmp_name = $file['tmp_name'];
        $error = $file['error'];
        $fsize = $file['size'];
        if ($error == 0)
        {
            if ($fsize > $maxsize)
                $errors['fsize'] = "The file is too large! Your file must be 5MB or lower!";
            if (empty($errors))
            {
                $new_fname = uniqid('', false) . "." . end($ftype);
                $final_path = "videos/" . $new_fname;
                if (move_uploaded_file($tmp_name, $final_path))
                    return $final_path;
                else
                {
                    $errors['fmove'] = "There was a problem uploading the file!";
                    return false;
                }
            }
        }
        else
            $errors['ferror'] = "There was an error with the file!";
    }
}
?>