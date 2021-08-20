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
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <title>Skill Learning</title>
    </head>
    <body>
        <nav class="navbar navbar-dark navbar-expand-sm text-center fixed-top">
            <a href="index.php" class="logo"><img src="images/placeholderlogo.png" alt=""></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle naviation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbar-list-2">
                <ul class="navbar-nav text-center">
                    <li class="nav-item"><a class="nav-link" href="all.php">All</a></li>
                    <li class="nav-item"><a class="nav-link" href="martialarts.php">Martial arts</a></li>
                    <li class="nav-item"><a class="nav-link" href="talents.php">Talents</a></li>
                    <li class="nav-item"><a class="nav-link" href="survivalskills.php">Survival skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="basicskills.php">Basic skills</a></li>
                    <li class="nav-item"><a class="nav-item" href="arts.php">Arts</a></li>
                    <li class="nav-item"><a class="nav-link" href="list.php" style="color: white;">Create classroom</a></li>
                </ul>
                <ul class="navbar-nav float-right">
                    <?php if ($_SESSION['loggedin'] == true): ?>
                        <li class="nav-item active"><a class="nav-link" href="user.php"><ion-icon name="person-circle-outline"></ion-icon> Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?> <span class="sr-only"></span></a></li>
                        <li class="nav-item active logout"><a class="nav-link" href="logout.php"><ion-icon name="log-out-outline"></ion-icon> Logout <span class="sr-only">(current)</span></a></li>
                    <?php else: ?>
                        <li class="nav-item active login"><a class="nav-link" href="signup.php"><ion-icon name="person-circle-outline"></ion-icon> Sign up <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item active login"><a class="nav-link" href="login.php"><ion-icon name="person-circle-outline"></ion-icon> Login <span class="sr-only">(current)</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>