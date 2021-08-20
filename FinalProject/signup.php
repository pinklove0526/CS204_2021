<?php include 'includes/header.php';
include 'classes/User.php';
if (isset($_POST['create-account']))
{
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password1'];
    $user_password2 = $_POST['password2'];
    $user = new User($conn);
    $user->checkNewUser($user_name, $user_email, $user_password, $user_password2);
    $errors = $user->errors;
}
?>

        <style media="screen"><?php include 'css/style.css'; ?></style>
        <div class="container-fluid">
            <section>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5"><h2 class="display-2 text-light">Create a new account</h2></div>
                    </div>
                    <?php if (isset($errors) && !empty($errors)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php foreach ($errors as $error): ?>
                                <?php echo $error . "<br>"; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="login-wrap p-0">
                                <h3 class="mb-4 text-center text-light">Join us</h3>
                                <form class="" action="signup.php" method="POST">
                                    <div class="form-group">
                                        <label for="username"></label>
                                        <input class="signup signup-username" type="text" placeholder="Username" name="username" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"></label>
                                        <input class="signup signup-emails" type="email" placeholder="Email" name="email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="password1"></label>
                                        <input class="signup signup-password1" type="password" placeholder="Password" name="password1" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="password2"></label>
                                        <input class="signup signup-password2" type="password" placeholder="Confirm password" name="password2" value="">
                                    </div>
                                    <div class="form-group"><button class="form-control btn btn-success" type="submit" name="create-account">Create account</button></div>
                                </form>
                                <p class="w-100 text-center text-light">Or sign in with</p>
                                <div class="social text-center">
                                    <a href="#"><ion-icon name="logo-facebook" class="p-3 display-4"></ion-icon></a>
                                    <a href="#"><ion-icon name="logo-twitter" class="p-3 display-4"></ion-icon></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<?php include 'includes/footer.php'; ?>