<?php
 
/*
Subpages (under the content)
*/

get_header(); 
$path = get_template_directory_uri().'/images/'; //get the image folder of current theme
?>

	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="postheader"><?php the_title(); ?></h2>
		<span class="post-info">Last modified: <?php the_modified_date(); ?></span>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page <img src="'.$path.'right.png" alt=">>" style="border:0;vertical-align:middle;padding-left:3px;" /></p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			<div class="divider clear"></div>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>		
		<?php //Check if there are subpages and if there are list them as links
			$children = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=desc'); 	
			if ($children) { ?>
				<div id="list-subpages">
				<!-- the headline for list of subpages -->
				<h3>Subpages</h3>
				<ul>
				<?php foreach ($children as $page){ //List subpages to current page ?>
					<li>
					<?php
						$date =  mysql2date('F j, Y',$page->post_modified); //Get the last modified date for the subpage in the format: April 20, 2009
						$info = '<span class="page-link"><a href="'.get_page_link($page->ID).'" title="'.$page->post_title.'">'.$page->post_title.'</a></span> - <span class="post-info">Last modified on '.$date.'</span><br />'; 						
						echo $info;						
						?>
					</li>
				<?php } ?>
				</ul>
				</div>
		<?php } ?>
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