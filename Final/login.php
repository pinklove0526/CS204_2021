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
                    <!-- Create account form here -->
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

<?php include 'includes/footer.php'; ?>