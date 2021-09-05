<?php
session_start();
if (!isset($_SESSION['loggedin']))
    $_SESSION['loggedin'] = false;
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <style media="screen">
            .jumbotron
            {
                background-image: url(images/students.png);
                background-size: auto;
            }

            .jumbotron .container
            {
                background: #FFFFFFA6;
                padding: 40px;
            }

            footer
            {
                background: #03A9F4;
                padding: 5%;
                text-align: center;
                color: white;
            }
        </style>
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">My ITEC Classmates</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php"><ion-icon name="home-outline"></ion-icon> Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="create.php"><ion-icon name="people-outline"></ion-icon> Add classmate</a></li>
                    </ul>
                    <ul class="navbar-nav float-left">
                        <li class="nav-item active"><a class="nav-link" href="login.php"><ion-icon name="log-in-outline"></ion-icon> Login <span class="sr-only">(current)</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>