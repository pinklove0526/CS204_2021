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

        <style media="screen"><?php include 'css/style.css'; ?></style>
        <section>
            <div class="img-responsive"><img src="https://i.pinimg.com/originals/e6/90/5c/e6905c4ac56db067d3b265763af49d22.jpg" alt=""></div>
            <div class="text-center">
                <?php if (isset($errors) && !empty($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($errors as $error): ?>
                            <?php echo $error . "<br>"; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5"><h2 class="display-2 text-light">Login</h2></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center text-light">Have an account?</h3>
                            <form class="" action="login.php" method="POST">
                                <div class="form-group"><input class="login-username" type="text" placeholder="Username" name="username" value="<?php if (isset($name)) echo htmlspecialchars($name); ?>"></div>
                                <div class="form-group"><input class="login-username" type="password" placeholder="Password" name="password" value=""></div>
                                <div class="form-group"><button class="form-control btn btn-success" type="submit" name="login">Sign in</button></div>
                                <div class="form-group text-center">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary text-light" for=""> Remember me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50"><a href="#" class="text-light">Forgot password</a></div>
                                </div>
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

<?php include 'includes/footer.php'; ?>