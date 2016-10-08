<?php

?>
<div id="sidebar-bottom">
<ul>
<?php 	/* Widgetized sidebar, if you have the plugin installed. */ 
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Bottom') ) : ?>
	<li id="tag_cloud" class="widget widget_tag_cloud widget_bottom">
		<div class="h2-bg"><h2 class="widgettitle">Tags</h2></div>
		<?php wp_tag_cloud('smallest=8&largest=15&number=50&order=RAND'); ?>
	</li>				
	<li id="calendar-bottom" class="widget widget_bottom">		
		<div class="h2-bg"><h2 class="widgettitle">Calendar</h2></div>
		<?php get_calendar(true); ?>
	</li>
<?php endif; ?>
</ul>
</div>