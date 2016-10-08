<?php get_header(); ?>

<div id="tagline-right">
        	<h1><?php echo get_option('del_blogpage_tagline'); ?><small><?php echo get_option('del_blogpage_subtagline'); ?></small></h1>
        </div>
        
    <div id="main">   
        
        <div class="column_medium">

           <div id="blog_entries">

	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h2 style="border-bottom:1px solid #cdcdcd;padding-bottom:10px;margin-bottom:10px;">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h2 style="border-bottom:1px solid #cdcdcd;padding-bottom:10px;margin-bottom:10px;">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h2 style="border-bottom:1px solid #cdcdcd;padding-bottom:10px;margin-bottom:10px;">Archive for <?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2 style="border-bottom:1px solid #cdcdcd;padding-bottom:10px;margin-bottom:10px;">Archive for <?php the_time('F, Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2 style="border-bottom:1px solid #cdcdcd;padding-bottom:10px;margin-bottom:10px;">Archive for <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h2 style="border-bottom:1px solid #cdcdcd;padding-bottom:10px;margin-bottom:10px;">Author Archive</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2 style="border-bottom:1px solid #cdcdcd;padding-bottom:10px;margin-bottom:10px;">Blog Archives</h2>
	<?php } ?>

		
		<?php while (have_posts()) : the_post(); ?>
			
		<div class="excerpt">
        
			<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <div class="meta">Posted in: <?php the_category(', '); ?> &diams; <?php the_time('l, F jS, Y') ?>, <?php the_time() ?> &diams; <?php comments_popup_link(); ?></div> 
			<p><?php echo substr(get_the_content(), 0, 300); ?> <a href="<?php the_permalink(); ?>">[...]</a><p>
			
		</div>

		<?php endwhile; ?>

		<div class="alignleft pagination"><?php previous_posts_link('Previous') ?></div>
        <div class="alignright pagination"><?php next_posts_link('Next') ?></div>

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>

</div>
</div>
<div class="column_small column_last">
<?php get_sidebar(); ?>
</div>
</div>

<?php get_footer(); ?>