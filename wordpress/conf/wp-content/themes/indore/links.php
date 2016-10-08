<?php

?>

<?php get_header(); ?>

<div id="content">
<div class="links">
<!--<h2>Links:</h2>-->
<ul class="xoxo">
<?php wp_list_bookmarks('title_li=&show_description=1&between= - '); ?>
</ul>
</div>
</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>