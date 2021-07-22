<?php
class Messenger
{
    public static function checkMsg()
    {
        if (isset($_SESSION['msg']))
            return true;
        else
            return false;
    }

    public static function initializeMessenger()
    {
        $_SESSION['msg'] = [];
    }

    public static function outputMsg()
    {
        $msgClass = $_SESSION['msg']['class'];
        $msg_output = "<div class='alert mt-4 alert-{$msgClass}' role='alert'>";
        foreach ($_SESSION['msg'] as $msg)
        {
            $message = $msg['msg'];
            $msgIcon = $msg['icon'];
            $msg_output .= "<p><ion-icon name='{$msgIcon}'></ion-icon> {$message}</p>";
        }
        $msg_output .= "</div>";
        return $msg_output;
    }

    public static function clearMsg()
    {
        $_SESSION['msg'] = [];
        unset($_SESSION['msg']);
    }

    public static function setMsg($msg, $class, $icon)
    {
        $newmsg = [];
        $newmsg['msg'] = $msg;
        $newmsg['class'] = $class;
        $newmsg['icon'] = $icon;
        array_push($_SESSION['msg'], $newmsg);
    }
}
?>