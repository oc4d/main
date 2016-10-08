<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h2 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h2>

	<ol class="commentlist">
  
	<?php foreach ($comments as $comment) : ?>

		<li class="<?php if (1 == $comment->user_id) $oddcomment = authcomment; echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
                	<div class="comment_left">
                    	<?php echo get_avatar( $comment, $size='50' );  ?>
                    </div>
                    <div class="comment_right">
                    	<div class="comment_meta">
                        	<div class="name"><strong>Posted by:</strong> <span><?php comment_author_link() ?></span></div>
                            <div class="date"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></div>

                        </div>
                        <div class="comment_content">
                        <?php if ($comment->comment_approved == '0') : ?>
						<em>Your comment is awaiting moderation.</em>
						<?php endif; ?>
                        
                        	<?php comment_text() ?>	
                            
                        </div>
                    </div>
        </li>

	<?php endforeach; /* end for each comment */ ?>    
    
	</ol>

    <div class="alignleft pagination"><?php previous_comments_link() ?></div>
    <div class="alignright pagination"><?php next_comments_link() ?></div>


<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

	<h2><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>

	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<?php else : ?>

		<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

		<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

		<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
		<label for="url"><small>Website</small></label></p>

		<?php endif; ?>

		<!--<p><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

		<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

		<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>