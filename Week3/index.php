<?php
$error = false;
if (isset($_POST['submit']))
{
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);
    if (strlen($username) < 5 || strlen($username) > 20)
    {
        $username_warning = "Username must be between 5 - 20 characters!";
        $error = true;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $email_warning = "Invalid email submitted!";
        $error = true;
    }
    if (strlen($password1) < 5)
    {
        $password1_warning = "Password must be more than 5 characters!";
        $error = true;
    }
    if ($password1 != $password2)
    {
        $password2_warning = "Passwords don't match!";
        $error = true;
    }
}
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
            .warning
            {
                color: red;
                font-style: italic;
            }
        </style>
        <title>ITEC CS204 Week 3: Form filtering and validation</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">ITEC Week 3.2 Filtering Input</a>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <h1 class="display-3">Filtering user input in PHP</h1>
                    <p class="lead">Using the filter_var() function and constants</p>
                </div>
            </div>
        </div>
        <div class="container">
            <?php if ($error): ?>
                <div class="alert alert-danger">There was a problem with your form!</div>
            <?php elseif ($error == false && isset($_POST['submit'])): ?>
                <div class="alert alert-success">Thank you for submitting the form!</div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6">
                    <form class="" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php if (isset($username)) echo $username; ?>">
                            <div class="warning"><?php if (isset($username_warning)) echo $username_warning; ?></div>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php if (isset($email)) echo $email; ?>">
                            <div class="warning"><?php if (isset($email_warning)) echo $email_warning; ?></div>
                        </div>
                        <div class="mb-2">
                            <label for="password1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password1" value="<?php if (isset($password1)) echo $password1; ?>">
                            <div class="warning"><?php if (isset($password1_warning)) echo $password1_warning; ?></div>
                        </div>
                        <div class="mb-2">
                            <label for="password2" class="form-label">Confirm password</label>
                            <input type="password" class="form-control" name="password2">
                            <div class="warning"><?php if (isset($password2_warning)) echo $password2_warning; ?></div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block mb-5" name="submit">Submit form</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <?php if ($error == false && isset($_POST['submit'])): ?>
                        <img src="images/jb268vM.gif" alt="">
                    <?php endif; ?>
                </div>
            </div>
            <?php var_dump($_POST); ?>
        </div>
        <footer style="background: black; color: white; text-align: center; padding: 30px;">
            <h2>Itecky Design <?php echo date("Y"); ?></h2>
        </footer>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        -->
    </body>
</html>