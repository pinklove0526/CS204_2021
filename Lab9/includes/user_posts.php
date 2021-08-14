<?php $posts = $user->getPosts(); ?>

        <div class="col-md-8 col-lg-9 user-nav-wrapper mt-4 container user-posts">
            <div class="row">
                <h1 class="display-4">Your posts</h1>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Post title</th>
                        <th>Number of comments</th>
                    </tr>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post['post_title']; ?></td>
                            <td><?php echo $post['comment_count']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>