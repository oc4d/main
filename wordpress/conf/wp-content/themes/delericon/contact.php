<?php
/*
Template Name: Contact
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
        
        <div class="column_medium">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?> 
            
            <div id="contact_form">
             	<form action="<?php bloginfo('template_directory'); ?>/mail.php" method="get" id="contactForm">
                <p><label for="name">Your Name *</label><br />

                <input type="text" value="" id="name" name="name" class="required" /></p>
                
                <p><label for="email">Your E-mail *</label><br />

                <input type="text" value="" id="email" name="email" class="required email" /></p>
                
                <p><label for="message">Your Message *</label><br />
                <textarea id="message" name="message" class="required" cols="" rows=""></textarea></p>
                
                <input id="to" name="to" type="hidden" value="<?php echo stripslashes(get_option('del_contact_email')); ?>" />
                
                <p><input type="submit" value="Send Message" id="submit" name="submit"/></p>

                </form>            
             </div>
            
        </div> 
        
        <div class="column_small column_last">
                       
            <?php echo get_option('del_contact_sidebar'); ?>
            
        </div>
	</div>   
 
 
  
    
    


<?php get_footer(); ?>