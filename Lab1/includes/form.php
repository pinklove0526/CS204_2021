        <h3>Send us a message</h3>
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" value="">
            <label for="email">Email</label>
            <input type="email" name="email" value="">
            <label for="msg">Your message</label>
            <input type="text" name="msg" value="">
            <label for="subscribe">Subscribe to our newsletter</label>
            <input type="checkbox" name="subscribe" value="true">
            <button type="submit" name="button">Submit comment</button>
        </form>