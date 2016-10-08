<?php

get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="postheader"><?php the_title(); ?></h2>
		<span class="post-info">Last modified: <?php the_modified_date(); ?></span>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
			<div class="divider clear"></div>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>		
		<br style="clear:both;" />
		<p id="comments-status">														
			<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {	// Both Comments and Pings are open ?>
			You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.
			<br />You can <a href="#respond">leave a response</a>, or create a <a href="<?php trackback_url(); ?>" rel="trackback" title="Trackback URL: <?php trackback_url(); ?>">trackback</a> from your own site.
			<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { // Only Pings are Open ?>
			<br />Responses are currently closed, but you can post a <a href="<?php trackback_url(); ?> " rel="trackback" title="Trackback URL: <?php trackback_url(); ?>">trackback</a> from your own site.
			<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { // Comments are open, Pings are not ?>
			<br />You can skip to the end and leave a response. Pinging is currently not allowed.
			<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { // Neither Comments, nor Pings are open ?>
			<br />Both comments and pings are currently closed.
			<?php } ?>
		</p>
		<?php comments_template(); ?>
		<?php endwhile; endif; ?>	
	</div>

<?php get_sidebar('right'); ?>
<?php get_footer(); ?>