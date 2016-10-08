<?php
get_header();
?>
<!-- Start archive.php -->

	<div id="content">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<div class="alignright right">
					<h4 class="postheader"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></h4>
					<span class="post-info"><?php edit_post_link('Edit', '', ' '); ?> </span>
				</div>
				<h2 class="postheader">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>					
				</h2>
					

				<div class="entry">
					<?php the_excerpt()?>
				</div>
				<div class="divider clear"></div>
				<p>
                <span class="post-info"><?php the_author() ?>, <?php the_time('F jS Y') ?>   </span>	
                </p>
                <span class="postmetadata">
					<?php if (get_the_tags()) {the_tags( 'Tags: ', ', ', '<br /> ');} ?>	
					Posted in <?php the_category(', ') ?> 					
				</span>	
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</h2>");
		}
		get_search_form();

	endif;
?>

	</div>
<!-- End archive.php -->
<?php get_sidebar('right'); ?>

<?php get_footer(); ?>