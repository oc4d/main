<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div id="tagline-right">
        	<h1><?php echo get_post_meta($post->ID, "tagline_value", $single = true); ?><small><?php echo get_post_meta($post->ID, "subtagline_value", $single = true); ?></small></h1>
        </div>

    <div id="main">   
        
        <div class="column_medium">
   			<?php the_content(''); ?>
        </div>
        
        <div class="column_small column_last">
            
			<?php get_sidebar(); ?> 

        </div>        

	</div>   

		<?php endwhile; endif; ?>

<?php get_footer(); ?>