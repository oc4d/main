<?php

get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<h2 class="postheader">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>					
				</h2>
				<div class="entry">
					<?php the_content('Read more...'); ?>
				</div>
                <div class="alignright right">
					<h4 class="postheader"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></h4>
					<span class="post-info"><?php edit_post_link('Edit', '', ' '); ?> </span>
				</div>
				
			
                <span class="post-info"><?php the_author() ?>, <?php the_time('F jS Y') ?> | </span>	
                
                <span class="postmetadata">
					<?php if (get_the_tags()) {the_tags( 'Tags: ', ', ', '<br /> ');} ?>	
					Posted in <?php the_category(', ') ?> 					
				</span>
                				
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Posts') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></div>
		</div>
		<br style="clear:both;" />

	<?php else : ?>

		<h2 class="center not-found">Not Found</h2>
		<p class="center">Hopla! You are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div><!-- End <div id="content"> -->

<?php get_sidebar('right'); ?>
<?php get_footer(); ?>