<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?> 

<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
    <?php if(get_option('del_slider') == "3D XML Slider") { ?>
     <div id="featured">
        <!--  Insert CU3ER div container -->
        <div id="cu3er-container">
            <a href="http://www.adobe.com/go/getflashplayer">
                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
            </a>
        </div>
     </div>
    <?php } ?>
    <?php if(get_option('del_slider') == "jQuery Fader") { ?>
        <ul id="featured-alt">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php the_content(''); ?>
        <?php endwhile; endif; ?>
        </div>    
    <?php } ?>    

<div id="tagline-center">
        	<h1><?php echo get_option('del_homepage_tagline'); ?></h1>
        </div>

    <div id="main">   
        
        <div class="column_small">
            <h2><?php echo get_option('del_column_left_title'); ?></h2>
            
            <?php echo get_option('del_column_left_content'); ?>
            
			<img src="<?php echo get_option('del_column_left_image'); ?>" alt="<?php echo get_option('del_column_left_title'); ?>" width="260" height="80" />
            
        </div>
        
        <div class="column_small">
            <h2><?php echo get_option('del_column_middle_title'); ?></h2>
            
            <?php echo get_option('del_column_middle_content'); ?>
            
			<img src="<?php echo get_option('del_column_middle_image'); ?>" alt="<?php echo get_option('del_column_middle_title'); ?>" width="260" height="80" />
            
        </div> 
        
        <div class="column_small column_last">
            <h2><?php echo get_option('del_column_right_title'); ?></h2>
            
            <?php echo get_option('del_column_right_content'); ?>
            
			<img src="<?php echo get_option('del_column_right_image'); ?>" alt="<?php echo get_option('del_column_right_title'); ?>" width="260" height="80" />
            
        </div>
	</div>   
 
 
  
    
    


<?php get_footer(); ?>