<?php


get_header();
?>

	<div id="content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="postheader"><?php the_title(); ?></h2>
			<span class="post-info">Posted <?php the_time('F jS Y') ?> at <?php the_time() ?> by <?php the_author() ?> </span>	
			<span class="post-info"><?php edit_post_link('Edit', ' | ', ' '); ?> </span>
			<div class="entry">				
				<div class="caption attachment">					
					<div class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></div>
					<?php if ( !empty($post->post_excerpt) ) ?> <?php>the_excerpt(); // this is the "caption" ?>
				</div>
			</div>
			<h4 class="postheader">Description:</h4>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
			</div>
			<div class="navigation">
				<div class="alignleft"><?php previous_image_link() ?></div>
				<div class="alignright"><?php next_image_link() ?></div>
			</div>
			<br style="clear:both;" />
			<p id="comments-status">								
				<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {	// Both Comments and Pings are open ?>
				You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.
				<br />You can <a href="#respond">leave a response</a>, or create a <a href="<?php trackback_url(); ?>" rel="trackback" title="Trackback URL: <?php trackback_url(); ?>">trackback</a> from your own site.
				<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { // Only Pings are Open ?>
				<br />Responses are currently closed, but you can post a <a href="<?php trackback_url(); ?> " rel="trackback" title="Trackback URL: <?php trackback_url(); ?>">trackback</a> from your own site.
				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { // Comments are open, Pings are not ?>
				You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.
				<br />You can skip to the end and leave a response. Pinging is currently not allowed.
				<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { // Neither Comments, nor Pings are open ?>
				<br />Both comments and pings are currently closed.
				<?php } ?>
			</p>			
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no attachments matched your criteria.</p>

<?php endif; ?>

	</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>