<?php
function get404()
{
    include 'includes/page_not_found.php';
}

function sanitizeArray($arr)
{
    foreach ($arr as $key => $value)
    {
        if (is_int($value))
            $arr[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        elseif (is_string($value))
            $arr[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        elseif (is_email($value))
            $arr[$key] = filter_var($value, FILTER_SANITIZE_EMAIL);
        elseif (is_url($value))
            $arr[$key] = filter_var($value, FILTER_SANITIZE_URL);
        else
            $arr[$key] = "";
    }
    return $arr;
}
?>