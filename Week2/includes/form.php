        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="name">Your name</label><br>
            <input type="text" name="name" value=""><br>
            <label for="email">Your email</label><br>
            <input type="email" name="email" value=""><br>
            <label for="msg">Message</label><br>
            <input type="text" name="msg" value=""><br>
            <label for="gender">Gender</label><br>
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <button type="submit" name="submit" value="true">Submit</button>
        </form>