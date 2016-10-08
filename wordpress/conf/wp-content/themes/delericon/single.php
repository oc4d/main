<?php get_header(); ?>

<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>

<div id="tagline-right">
        	<h1><?php echo get_option('del_blogpage_tagline'); ?><small><?php echo get_option('del_blogpage_subtagline'); ?></small></h1>
        </div>

<div id="main">   
        
        <div class="column_medium">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="excerpt" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<div class="meta">Posted in: <?php the_category(', '); ?> &diams; <?php the_time('l, F jS, Y') ?>, <?php the_time() ?> &diams; <?php comments_popup_link(); ?></div>             
                  <div class="snippet">
                      <img src="<?php echo get_post_meta($post->ID, "post_image_value", $single = true); ?>" alt="<?php the_title(); ?>" width="250" /> 
                     <?php the_content(''); ?>

                  </div>
			
			<p>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
				
				You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

				<?php if ( comments_open() && pings_open() ) {
				// Both Comments and Pings are open ?>
				You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

				<?php } elseif ( !comments_open() && pings_open() ) {
				// Only Pings are Open ?>
				Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

				<?php } elseif ( comments_open() && !pings_open() ) {
				// Comments are open, Pings are not ?>
				You can skip to the end and leave a response. Pinging is currently not allowed.

				<?php } elseif ( !comments_open() && !pings_open() ) {
				// Neither Comments, nor Pings are open ?>
				Both comments and pings are currently closed.

				<?php } edit_post_link('Edit this entry','','.'); ?>

			</p>
				
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
</div>

<div class="column_small column_last">

<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>