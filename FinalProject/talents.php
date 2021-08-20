<?php include 'includes/header.php';
include 'classes/Classroom.php';
include 'func/classroomManager.php';
?>

        <style media="screen"><?php include 'css/style.css'; ?></style>
        <div class="container-fluid">
            <div class="img-fluid"><img src="http://1.bp.blogspot.com/-aoLpZCDVDnA/VHrOvTNl0AI/AAAAAAAAEOk/dC9KbX1MBcw/s1600/NATURAL%2BLANDSCAPE.jpg" class="w-100" alt=""></div>
        </div>
        <div class="container text-center mt-3 background-bg">
            <h3>Therese are the classrooms:</h3>
            <hr>
            <div class="row">
                <?php
                    $classrooms = getTalents(12, $conn);
                    outputClassrooms($classrooms);
                ?>
                <hr>
            </div>
            <hr>
        </div>

<?php include 'includes/footer.php'; ?>