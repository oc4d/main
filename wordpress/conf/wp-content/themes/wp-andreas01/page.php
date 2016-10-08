<?php get_header(); ?>

<div id="contentwide">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post">
<h2><?php the_title(); ?></h2>
<?php the_content('<p class="serif">Read more &raquo;</p>'); ?>
<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
<?php edit_post_link('Edit this page','<p>','</p>'); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
</div>
</div>

<?php get_footer(); ?>