<?php include 'includes/header.php';
include 'classes/Classroom.php';
$errors = [];
if (isset($_POST['submit']))
{
    $class_name = $_POST['class_name'];
    $class_type = $_POST['class_type'];
    $info = $_POST['info'];
    $classroom = new Classroom($conn);
    $classroom->checkCreateClassroom($class_name, $class_type, $info, $errors);
    $video = $classroom->checkFile($_FILES, "video", $errors);
    if (empty($errors) && $video != false)
        $classroom->createClassroom($class_name, $class_type, $info, $video);
}
?>

        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <?php if ($_SESSION['loggedin'] == false): ?>
                    <div class="mt-5 col-md-6 offset-md-3 text-center">
                        <h2 class="display-5">Please login to add a classroom!</h2>
                        <p>Create an account or login to add a classroom to the website.</p>
                        <button type="button" class="btn btn-block btn-outline-primary"><a href="login.php"><ion-icon name="person-circle-outline"></ion-icon> Create account / login</a></button>
                    </div>
                <?php else: ?>
                    <div class="mt-3 col-md-6 offset-md-3">
                        <h2>Create a classroom</h2>
                        <div class="text-center">
                            <?php if (!empty($errors)): ?>
                                <div class="alert alert-danger" role="alert"><?php var_dump($errors); ?></div>
                            <?php endif; ?>
                        </div>
                        <form class="" action="list.php" method="POST" enctype="multipart/form-data">
                            <label for="class_name">Class name</label>
                            <input type="text" name="class_name" placeholder="Class name" value="" class="form-control">
                            <hr>
                            <label for="class_type">Class type</label><br>
                            <input type="radio" id="" name="class_type" value="martial arts" checked> Martial arts <br>
                            <input type="radio" id="" name="class_type" value="talents"> Talents <br>
                            <input type="radio" id="" name="class_type" value="survival skills"> Survival skills <br>
                            <input type="radio" id="" name="class_type" value="basic skills"> Basic skills <br>
                            <input type="radio" id="" name="class_type" value="arts"> Arts
                            <hr>
                            <label for="info">Class info</label>
                            <textarea name="info" class="form-control" cols="80" rows="8"></textarea>
                            <input type="file" name="video" class="form-control mt-1 mb-1">
                            <button type="submit" name="submit" class="btn btn-outline-dark btn-block"><ion-icon name="school-outline"></ion-icon> Create classroom</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <br>

<?php include 'includes/footer.php'; ?>