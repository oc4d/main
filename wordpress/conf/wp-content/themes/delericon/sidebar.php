
			<?php if(!is_home() and !is_search() and !is_single() and !is_archive()) {
				/* For non-blog pages */ ?>
					<?php
						
											if($post->post_parent) {
						$children = wp_list_pages("sort_column=menu_order&depth=1&title_li=&child_of=".$post->post_parent."&echo=0");
						} else { $children = wp_list_pages("sort_column=menu_order&depth=1&title_li=&child_of=".$post->ID."&echo=0");
						}
						if ($children) { ?>
                        <h2>Sub Navigation</h2>
						<ul class="subnav">
						<?php echo $children; ?>
						</ul>
						<?php } ?>
                        
                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Non-Blog Sidebar')) : ?>
						<?php endif; ?>
                        
			<?php } ?>
			
			<?php if(is_home() or is_search() or is_single() or is_archive()) {
			/* For blog page */	?>
					<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar')) : ?>
					<?php endif; ?>
					<?php 
						if(get_option('da_search')=="true")
							get_search_form();
			 } ?>
			
			
