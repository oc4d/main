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
           <?php if(have_posts()) :  ?>
           
           <h2 style="border-bottom:1px solid #cdcdcd;padding-bottom:10px;margin-bottom:10px;">Search results for "<?php the_search_query(); ?>"</h2>
           <?php while(have_posts()) : the_post(); ?>
            <div class="excerpt">
        
			<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <div class="meta">Posted in: <?php the_category(', '); ?> &diams; <?php the_time('l, F jS, Y') ?>, <?php the_time() ?> &diams; <?php comments_popup_link(); ?></div> 
			<p><?php echo substr(get_the_content(), 0, 300); ?> <a href="<?php the_permalink(); ?>">[...]</a><p>
			
		</div>
               

            
            
          <?php endwhile;  ?>
		  
		   <div class="alignleft pagination"><?php previous_posts_link('Previous') ?></div>
                <div class="alignright pagination"><?php next_posts_link('Next') ?></div>
		  
		  <?php else :  ?>    
            
            <h2>No search results found for "<?php the_search_query(); ?>"</h2>
            
         <?php endif; ?>
                 
   			</div>
                 
        </div> 
        
        <div class="column_small column_last">
			<?php get_sidebar(); ?>            
        </div>
	</div>   

<?php get_footer(); ?>