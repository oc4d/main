<?php

?>


	<div id="sidebar-right">
		
      <div class="search">
	<?php get_search_form(); ?>
</div>

<a href="?feed=rss2" title="Subscribe to RSS feed" rel="nofollow"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" alt="Subscribe to RSS feed" /></a>  
        
        <ul>
			<?php /* Widgetized sidebar, if you have the plugin installed. */
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Right') ) : ?>		
			
            <li><h2>News</h2>
				<ul>
				<?php $num = 5; //change this number to display more or less posts
					$postslist = get_posts('numberposts=$num'); // get the posts					
					foreach ($postslist as $post) : 
					setup_postdata($post); ?>			
					<li>
					<a href="<?php the_permalink(); ?>" title="Posted in: <?php foreach((get_the_category()) as $category) { 
						echo ' &bull; ' . $category->cat_name . '  '; } ?>"><?php the_title(); ?>   </a>
					</li>
				<?php endforeach; // end listing of random posts?>
				</ul>
			</li>
            <li class="divider"></li>
            <!-- Display pages -->	
			<?php wp_list_pages('sort_column=menu_order&depth=1&title_li=<h2>Pages</h2>&class=menu' ); //Show a flat list of all pages, including subpages ?>
			<li class="divider"></li>
			<!-- Display categories -->
			<?php wp_list_categories('show_last_updated=1&depth=1&title_li=<h2>Categories</h2>&class=menu'); ?>			
			<li class="divider"></li>	
			
            
            
            
            
            
			<li><h2>Archives</h2>
				<ul>
				<?php wp_get_archives('type=monthly&class=menu'); ?>
				</ul>
			</li>	
			<?php endif; ?>
		</ul>
	</div>