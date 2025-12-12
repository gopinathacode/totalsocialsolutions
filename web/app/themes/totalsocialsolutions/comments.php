<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die(__('Please do not load this page directly. Thanks!', 'wbmservice'));

if (post_password_required()) {
    ?>
    <p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'wbmservice'); ?></p>
    <?php
    return;
}
?>

<?php // You can start editing here. ?>

<?php if (have_comments()) : ?>
    <div class="media comment_section">
        <h3 id="comments"><?php _e("Comments", 'studiopress'); ?></h3>
        <strong><?php comments_number(__('No Responses', 'studiopress'), __('One Response', 'studiopress'), __('% Responses', 'studiopress')); ?> <?php _e("to", 'studiopress'); ?> &#8220;<?php the_title(); ?>&#8221;</strong>
        <ol class="commentlist">
            <?php wp_list_comments('type=comment&avatar_size=48'); ?>
        </ol>
        <div class="navigation">
            <div class="alignleft"><?php previous_comments_link() ?></div>
            <div class="alignright"><?php next_comments_link() ?></div>
        </div>

        <?php if (!empty($comments_by_type['pings'])) : ?>
            <h3><?php _e("Trackbacks", 'studiopress'); ?></h3>
            <strong><?php _e("Check out what others are saying about this post...", 'studiopress'); ?></strong>
            <ol class="commentlist">
                <?php wp_list_comments('type=pings'); ?>
            </ol><br /><br />
        <?php endif; ?>
        <?php //wp_list_comments('type=comment&callback=blogs_single_comment'); ?>
    </div>
    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>

    <?php if (!empty($comments_by_type['pings'])) : ?>
        <h3><?php _e("Trackbacks", 'wbmservice'); ?></h3>
        <strong><?php _e("Check out what others are saying about this post...", 'wbmservice'); ?></strong>
        <ol class="commentlist">
            <?php wp_list_comments('type=pings'); ?>
        </ol><br /><br />
    <?php endif; ?>

<?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <?php // If comments are open, but there are no comments. ?>

    <?php else : // comments are closed ?>
        <?php // If comments are closed. ?>
        <p class="nocomments"><?php _e("Comments are closed.", 'wbmservice'); ?></p>

    <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

    <div id="respond">

        <h4><?php _e('Leave a Reply', 'wbmservice'); ?></h4>
        <?php if (!is_user_logged_in()) { ?>
            <p><?php _e('Make sure you enter the(*)required information where indicate.HTML code is not allowed', 'wbmservice'); ?></p>
        <?php } else { ?>
            <p><?php _e("Tell us what you're thinking...", 'wbmservice'); ?> <br /><?php _e("and oh, if you want a pic to show with your comment, go get a", 'wbmservice'); ?> <a href="http://en.gravatar.com" >gravatar</a>!</p>
        <?php } ?>
        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </div>

        <?php if (get_option('comment_registration') && !$user_ID) : ?>
            <p><?php _e("You must be", 'wbmservice'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in", 'wbmservice'); ?></a> <?php _e("to post a comment", 'wbmservice'); ?>.</p></div>
    <?php else : ?>

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <div class="row">
                <?php if ($user_ID) : ?>
                    <div class="col-sm-7">
                        <p><?php _e("Logged in as", 'wbmservice'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Log out of this account", 'wbmservice'); ?>"><?php _e("Log out", 'wbmservice'); ?> &raquo;</a></p>
                    </div>
                <?php else : ?>


                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="author"><?php _e("Name", 'wbmservice'); ?> <?php if ($req) _e("*", 'wbmservice'); ?></label>
                            <input type="text" name="author" class="form-control" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
                        </div>

                        <div class="form-group">
                            <label for="email"><?php _e("Email (will not be published)", 'wbmservice'); ?> <?php if ($req) echo _e("*", 'wbmservice'); ?></label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
                        </div>

                        <div class="form-group">
                            <label for="url"><?php _e("URL", 'wbmservice'); ?></label>
                            <input type="text" name="url" class="form-control" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
                        </div>
                    </div>

                <?php endif; ?>
                <div class="col-sm-7"> 
                    <div class="form-group">
                        <textarea name="comment" class="form-control" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
                    </div>
                    <?php do_action('comment_form', $post->ID); ?>
                    <p><input name="submit" type="submit" class="btn btn-primary btn-lg" id="submit" tabindex="5" value="<?php _e("Submit Comment", 'wbmservice'); ?>" />
                        <?php comment_id_fields(); ?>
                    </p>
                </div>
            </div>
        </form>
        </div>

    <?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
