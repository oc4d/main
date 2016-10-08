<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div id="tagline-right">
        	<h1><?php echo get_post_meta($post->ID, "tagline_value", $single = true); ?><small><?php echo get_post_meta($post->ID, "subtagline_value", $single = true); ?></small></h1>
        </div>

    <div id="main">   
        
        <div class="column_large">
   			<?php the_content(''); ?>
        </div>

	</div>   

		<?php endwhile; endif; ?>

<?php get_footer(); ?>