<?php include 'includes/header.php'; ?>

        <h2>Contact</h2>
        <hr>
        <h4>Send us a message</h4>
        <hr>
        <?php
            if (!isset($_POST['submit']))
                include 'includes/form.php';
            else
            {
                echo "<h1>Thank you for your feedback, " . htmlspecialchars($_POST['name']) . "!</h1>";
                var_dump($_POST);
                if (!isset($_POST['email']))
                    echo "<h2>You forgot your email!</h2>";
            }
        ?>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<?php include 'includes/footer.php'; ?>