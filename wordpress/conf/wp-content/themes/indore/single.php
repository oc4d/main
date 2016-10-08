<?php


get_header();
$path = get_template_directory_uri().'/images/'; //get the image folder of current theme
?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2 class="postheader"><?php the_title(); ?></h2>
			<span class="post-info">Posted <?php the_time('F jS Y') ?> at <?php the_time() ?> by <?php the_author() ?> </span>	
			<span class="post-info"><?php edit_post_link('Edit', ' | ', ' '); ?> </span>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry <img src="'.$path.'right.png" alt=">>" style="border:0;vertical-align:middle;padding-left:5px;" /></p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>							
			</div>			
			<div class="divider clear"></div>
			<span class="postmetadata">
				<?php if (get_the_tags()) {the_tags( 'Tags: ', ', ', '<br /> ');} //make sure there's no line break if the post doesn't have tags?>
				Posted in <?php the_category(', ') ?> 		
			</span>	
		</div>		
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('<img src="'.$path.'left.png" alt="<<" style="border:0;vertical-align:middle;padding-right:3px;" /> %link') ?></div>
			<div class="alignright"><?php next_post_link('%link <img src="'.$path.'right.png" alt=">>" style="border:0;vertical-align:middle;padding-left:3px;" />') ?></div>
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
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<h2 class="center not-found">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

<?php endif; ?>

	</div><!-- End <div id="content"> -->
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>