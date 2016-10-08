<?php
/*
Template Name: Blog
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
        	<h1><?php echo get_option('del_blogpage_tagline'); ?><small><?php echo get_option('del_blogpage_subtagline'); ?></small></h1>
        </div>

    <div id="main">   
        
        <div class="column_medium">

           <div id="blog_entries">
           <?php 
		   $paged = get_query_var('paged');

		   $services = get_cat_ID(get_option('del_services_cat'));
		   $portfolio = get_cat_ID(get_option('del_portfolio_cat'));
		   query_posts('cat=-'.$services.',-'.$portfolio.'&paged='.$paged); ?>
           <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="excerpt">
            
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1> 
                <div class="meta">Posted in: <?php the_category(', '); ?> &rarr; <?php the_time('l, F jS, Y') ?>, <?php the_time() ?> &rarr; <?php comments_popup_link(); ?></div>             
                  <div class="snippet">
                      <img src="<?php echo get_post_meta($post->ID, "post_image_value", $single = true); ?>" alt="<?php the_title(); ?>" width="250" /> 
                     <?php the_content(''); ?>

                  </div>

                

            </div>
            
          <?php endwhile; endif; ?>    
            
            	<div class="alignleft pagination"><?php previous_posts_link('Previous') ?></div>
                <div class="alignright pagination"><?php next_posts_link('Next') ?></div>
                 
   			</div>
                 
        </div> 
        
        <div class="column_small column_last">
			<?php get_sidebar(); ?>            
        </div>
	</div>   

<?php get_footer(); ?>