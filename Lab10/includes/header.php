<?php
session_start();
if (!isset($_SESSION['loggedin']))
    $_SESSION['loggedin'] = false;
include 'db.php';
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
            .finished
            {
                text-decoration: line-through;
                color: lightgray;
            }
        </style>
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">ITEC To-do Final Review</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item" style="display: inline-flex;">
                            <?php if ($_SESSION['loggedin']): ?>
                                <a class="nav-link" href="#"><ion-icon name="person-circle-outline"></ion-icon> <?php echo $_SESSION['user_name']; ?></a>
                                <a class="nav-link" href="logout.php">| Logout</a>
                            <?php else: ?>
                                <a class="nav-link" href="login.php"><ion-icon name="person-circle-outline"></ion-icon> Login / create account</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>