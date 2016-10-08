<?php

?>

<br style="clear:both;" />
	<?php get_sidebar('bottom'); ?>
<br style="clear:both;" />

<div id="footer">
<!-- Hallo! Don�t put these codes away! They have important function here! -->
	<p>
    </p>
    <p>
		<?php bloginfo('name'); ?>
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
    
    
</div><!-- End <div id="footer"> -->
</div><!-- End <div id="page"> -->
<div id="bottom"></div>
		<?php wp_footer(); ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7523421-2");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>