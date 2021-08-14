<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>ITEC Blog 2021</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">ITEC Blog 2021</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php"><ion-icon name="home-outline"></ion-icon> Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="create.php"><ion-icon name="pencil-outline"></ion-icon> Create post</a></li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <?php if ($_SESSION['loggedin'] == true): ?>
                            <li class="nav-item active"><a class="nav-link" href="user.php"><ion-icon name="person-circle-outline"></ion-icon> Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?> | <span class="sr-only">(current)</span></a></li>
                            <li class="nav-item active"><a class="nav-link" href="logout.php"><ion-icon name="log-out-outline"></ion-icon> Logout <span class="sr-only">(current)</span></a></li>
                        <?php else: ?>
                            <li class="nav-item active"><a class="nav-link" href="login.php"><ion-icon name="person-circle-outline"></ion-icon> Login / create account <span class="sr-only">(current)</span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container"><?php if (isset($ismsg)) echo $messages; ?></div>