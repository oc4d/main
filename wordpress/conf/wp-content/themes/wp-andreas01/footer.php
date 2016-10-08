<div id="footer">
<p><span class="credits">&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a> - <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> - <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a> - <?php wp_loginout(); ?>
</div>
<?php do_action('wp_footer'); ?>
</div>
</body>
</html>