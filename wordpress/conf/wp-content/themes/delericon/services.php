<?php
/*
Template Name: Services
*/
?>

<?php get_header(); ?> 

<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
   

<div id="tagline-right">
        	<h1><?php echo get_post_meta($post->ID, "tagline_value", $single = true); ?><small><?php echo get_post_meta($post->ID, "subtagline_value", $single = true); ?></small></h1>
        </div>

    <div id="main">   
        
        <div class="column_large">
          
        
			<?php query_posts('category_name='.get_option('del_services_cat')); ?>
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="service">
            	<div class="image">

                	<img src="<?php echo get_post_meta($post->ID, "post_image_value", $single = true); ?>" alt="<?php the_title(); ?>" width="310" height="180" />
                </div>
                <div class="description">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <a href="<?php echo get_post_meta($post->ID, "portfolio_link_value", $single = true); ?>" class="visit_portfolio" title="Portfolio">Visit Our Portfolio</a>
                </div>

            </div>
            
                <?php endwhile; endif; ?>    
        </div>

	</div>   
 
 
  
    
    


<?php get_footer(); ?>