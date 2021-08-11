<?php
$page_name = basename($_SERVER['SCRIPT_NAME'], ".php");
$navLinks = ["home", "about", "contact"];
function outputNav($navLinks, $page_name)
{
    $output = "";
    foreach ($navLinks as $link)
    {
        if ($link == "home")
            $href = "index";
        else
            $href = $link;
        if ($href == $page_name)
            $theclass = "class='active'";
        else
            $theclass = '';
        $output .= "<li><a href='{$href}.php' {$theclass}>" . ucfirst($link) . "</a></li>";
    }
    echo $output;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>SimpDesign | <?php if ($page_name != "index") echo ucfirst($page_name); else echo "Home"; ?></title>
        <style media="screen">
            *
            {
                font-family: sans-serif;
                font-weight: lighter;
            }

            footer
            {
                background: black;
                color: white;
                text-align: center;
                padding: 20px;
            }

            header
            {
                background: #0CB9B9;
                padding: 5px;
                color: white;
            }

            .active
            {
                font-family: impact;
                color: #FFE4D0;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <header>
            <img src="images/y-nghia-thu-vi-va-nguon-goc-cua-tu-simp.png" width="50px" style="margin-top: 10px; border-radius: 50%; float: left; object-fit: cover; height: 50px;" alt="">
            <h1>SimpDesign</h1>
            <nav><ul><?php outputNav($navLinks, $page_name); ?></ul></nav>
        </header>