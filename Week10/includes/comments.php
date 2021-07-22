        <hr>
        <h3 class="display-4 mt-3 mb-3">Comments</h3>
        <hr>
        <div class="row comment-form">
            <div class="col-md-8 form">
                <?php if ($_SESSION['loggedin']): ?>
                    <form class="comment-form" action="func/ajaxmanager" method="POST">
                        <textarea name="comment-text" class="form-control" cols="80" rows="4"></textarea>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SERVER['QUERY_STRING']); ?>">
                        <button type="submit" name="comment-submit" class="comment-submit btn btn-outline-success mt-2"><ion-icon name="chatbubble-outline"></ion-icon> Add comment</button>
                    </form>
                <?php else: ?>
                    <h3>Please login to comment!</h3>
                    <a href="login.php"><button type="button" class="btn btn-primary btn-lg">Login</button></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row comments">
            <?php foreach ($comments->comments as $comment): ?>
                <?php $comment = Security::cleanOutput($comment); ?>
                <?php
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['comment_user'] || $_SESSION['user_role'] == 1)
                        $button = "<button class='btn float-right btn-sm btn-outline-danger delete-post' data-comment-id='{$comment['CID']}'>X</button>";
                    else
                        $button = "";
                    $thumbsdownclass = "";
                    $thumbsupclass = "";
                    $theid = $comment['CID'];
                    $thereview = array_filter($reviews->reviews, function ($data) use ($theid) {return $data['comment_id'] == $theid;});
                    if (!empty($thereview))
                    {
                        foreach ($thereview as $key)
                        {
                            $thumbsup = $key['thumbs_up'];
                            $thumbsdown = $key['thumbs_down'];
                            if ($key['user_reviewed'] == 1)
                            {
                                if ($key['user_reviewed_value'] == 1)
                                {
                                    $thumbsdownclass = "active";
                                    $thumbsupclass = "";
                                }
                                else
                                {
                                    $thumbsdownclass = "";
                                    $thumbsupclass = "active";
                                }
                            }
                        }
                    }
                    else
                    {
                        $thumbsup = 0;
                        $thumbsdown = 0;
                    }
                ?>
                <div class='comment-wrapper col-md-8'>
                    <div class='col-md-12 mt-2 mb-2 comment'>
                        <div class='card'>
                            <div class='card-header'>
                                <a href='user.php?id=<?php echo $comment['CID']; ?>' class='comment-user-id' data-comment-user-id='<?php echo $comment['UID']; ?>'><?php echo $comment['user_name']; ?></a> | <?php echo $comment['date_created']; ?>
                                <nav class="comment-thumb">
                                    <ul class="nav float-right">
                                        <li class="nav-item"><ion-icon name="thumbs-up-outline" class="<?php echo $thumbsupclass; ?>" data-review-value="2" data-review-type="thumb"></ion-icon></li>
                                        <li class="nav-item thumbs-up-val"><?php echo $thumbsup; ?></li>
                                        <li class="nav-item"><ion-icon name="thumbs-down-outline" class="<?php echo $thumbsdownclass; ?>" data-review-value="1" data-review-type="thumb"></ion-icon></li>
                                        <li class="nav-item thumbs-down-val"><?php echo $thumbsdown; ?></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class='card-body'>
                                <p class='card-text'><?php echo $comment['comment_text']; ?></p>
                                <?php echo $button; ?> <button class='btn float-right btn-sm btn-outline-secondary mr-2 reply-comment' data-comment-id='<?php echo $comment['CID']; ?>' data-comment-user-id='<?php echo $comment['UID']; ?>'>Reply</button>
                            </div>
                        </div>
                    </div>
                    <?php
                        $theid = $comment['CID'];
                        $thereply = array_filter($replies->replies, function ($data) use ($theid) {return $data['comment_id'] == $theid;});
                    ?>
                    <?php foreach ($thereply as $reply): ?>
                        <?php
                            $thumbsdownclass = "";
                            $thumbsupclass = "";
                            $theid = $reply['CID'];
                            $thereview = array_filter($reviews->reviews, function ($data) use ($theid) {return $data['comment_id'] === $theid;});
                            if (!empty($thereview))
                            {
                                foreach ($thereview as $key)
                                {
                                    $thumbsup = $key['thumbs_up'];
                                    $thumbsdown = $key['thumbs_down'];
                                    if ($key['user_reviewed'] == 1)
                                    {
                                        if ($key['user_reviewed_value'] == 1)
                                        {
                                            $thumbsdownclass = "active";
                                            $thumbsupclass = "";
                                        }
                                        else
                                        {
                                            $thumbsdownclass = "";
                                            $thumbsupclass = "active";
                                        }
                                    }
                                }
                            }
                            else
                            {
                                $thumbsup = 0;
                                $thumbsdown = 0;
                            }
                        ?>
                        <div class='col-md-11 offset-md-1 mt-2 mb-2 comment'>
                            <div class='card'>
                                <div class='card-header' style='background: lightgray;'>
                                    <a href='user.php?id=<?php echo $reply['UID']; ?>' class='comment-user-id' data-comment-user-id='<?php echo $reply['UID']; ?>'><?php echo $reply['user_name']; ?></a> <em>replying to </em> <?php echo $reply['response_to_user']; ?> | <?php echo $reply['date_created']; ?>
                                    <nav class="comment-thumb">
                                        <ul class="nav float-right">
                                            <li class="nav-item"><ion-icon name="thumbs-up-outline" class="thumb <?php echo $thumbsupclass; ?>" data-review-value="2" data-review-type="thumb"></ion-icon></li>
                                            <li class="nav-item thumbs-up-val"><?php echo $thumbsup; ?></li>
                                            <li class="nav-item"><ion-icon name="thumbs-down-outline" class="thumb <?php echo $thumbsdownclass; ?>" data-review-value="1" data-review-type="thumb"></ion-icon></li>
                                            <li class="nav-item thumbs-down-val"><?php echo $thumbsdown; ?></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'><?php echo $reply['comment_text']; ?></p>
                                    <?php echo $button; ?> <button class='btn float-right btn-sm btn-outline-secondary mr-2 reply-comment' data-comment-id='<?php echo $reply['CID']; ?>' data-comment-user-id='<?php echo $reply['UID']; ?>'>Reply</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>