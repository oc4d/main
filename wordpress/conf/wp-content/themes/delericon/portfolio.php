<?php
/*
Template Name: Portfolio
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
        <div class="portfolio">
             
			<?php query_posts('category_name='.get_option('del_portfolio_cat').'&posts_per_page=-1'); ?>
            <?php 
			$item = 1;
			if(have_posts()) : while(have_posts()) : the_post(); 
            
            if ($item == 1) echo '<div class="wrapper">'; ?>
            <div class="entry">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <a href="<?php echo get_post_meta($post->ID, "full_image_value", $single = true); ?>" rel="prettyPhoto[gallery]"><img src="<?php echo get_post_meta($post->ID, "post_image_value", $single = true); ?>" alt="<?php the_title(); ?>" /></a>
                <p><?php echo substr(get_the_content(), 0, 190); ?> <a href="<?php the_permalink(); ?>">[...]</a><p>
                </div>
            
				<?php if ($item == 3) echo '</div>'; ?>
           	<?php 
           $item = $item == 3 ? '1' : $item + 1;
                       
             endwhile; endif; ?>  
                
             </div>  
         
                <div class="alignleft pagination"><?php previous_posts_link('Previous') ?></div>
                <div class="alignright pagination"><?php next_posts_link('Next') ?></div>
        </div>

	</div>   
 
 
  
    
    


<?php get_footer(); ?>