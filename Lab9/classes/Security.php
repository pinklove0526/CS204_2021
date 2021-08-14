<?php
class Security
{
    public static function cleanOutput($arr)
    {
        foreach ($arr as $key => $value)
        {
            if (is_string($value))
                $arr[$key] = htmlspecialchars($value);
            elseif (is_int($value))
                $arr[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            elseif (is_email($value))
                $arr[$key] = filter_var($value, FILTER_SANITIZE_EMAIL);
            elseif (filter_var($value, FILTER_VALIDATE_URL))
                $arr[$key] = filter_var($value, FILTER_SANITIZE_URL);
            else
                $arr[$key] = '';
        }
        return $arr;
    }

    public static function validateInput($datatype, $arr) {}
}
?>