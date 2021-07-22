<?php
//Check the file for errors and return false if there are errors, or return the file path if it is OK
function checkFile($file, $type, &$errors, $maxsize = 5000000)
{
    $file = $file['image'];
    $fname = $file['name'];
    $ftype = explode("/", $file['type']);
    $tmp_name = $file['tmp_name'];
    $error = $file['error'];
    $fsize = $file['size'];
    $allowed_ext = fileExt($type);
    if ($error == 0)
    {
        //#1: Check the file extension
        if (!in_array(end($ftype), $allowed_ext) || $type != $ftype[0])
            $errors['fext'] = "Only {$type} file types allowed!";
        //#2: Check the file size
        if ($fsize > $maxsize)
            $errors['fsize'] = "The file is too large!";
        //If the $errors[] empty, move the file from the temp directory to the final directory
        if (empty($errors))
        {
            $new_fname = uniqid('', false) . "." . end($ftype);
            $final_path = "images2/" . $new_fname;
            if (move_uploaded_file($tmp_name, $final_path))
                return $final_path;
            else
            {
                $errors['fmove'] = "There was a problem uploading the file!";
                return false;
            }
        }
        else
            $errors['ferror'] = "There was an error with the file!";
    }
}

function fileExt($type)
{
    if ($type == "image")
        return ['png', 'jpeg', 'jpg', 'gif'];
    elseif ($type == "video")
        return ['mp4', 'mov', 'avi'];
}
?>