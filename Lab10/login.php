<?php include 'includes/header.php';
include 'classes/User.php';
if (isset($_POST['login']))
{
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $user = new User($conn);
    $user->checkLogin($user_name, $user_password);
    $errors = $user->errors;
}
if (isset($_POST['create-account']))
{
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_confirm_password = $_POST['confirm-password'];
    $user = new User($conn);
    $user->checkCreate($user_name, $user_email, $user_password, $user_confirm_password);
    $errors = $user->errors;
}
?>

        <div class="container mt-5">
            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors as $error): ?>
                        <?php echo $error . "</br>"; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6">
                    <h3><ion-icon name="add-outline"></ion-icon> Create account</h3>
                    <form class="" action="login.php" method="POST">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter your name...">
                        <p class="error error-username"></p>
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                        <p class="error error-email"></p>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        <label for="confirm-password">Confirm password</label>
                        <input type="password" name="confirm-password" class="form-control" placeholder="...">
                        <p class="error error-password"></p>
                        <button type="submit" class="btn btn-primary btn-block" name="create-account"><ion-icon name="add-outline"></ion-icon> Create account</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3><ion-icon name="person-circle-outline"></ion-icon> Login</h3>
                    <form class="" action="login.php" method="POST">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter your name...">
                        <p class="error error-username"></p>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="...">
                        <p class="error error-password"></p>
                        <button type="submit" name="login" class="btn btn-block btn-success"><ion-icon name="person-circle-outline"></ion-icon> Login</button>
                    </form>
                </div>
            </div>
        </div>

<?php
$password = "itec2021";
echo password_hash($password, PASSWORD_DEFAULT);
var_dump($_SERVER);
include 'includes/footer.php';
?>