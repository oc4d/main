<?php
$totale = get_option('posts_per_page');

function J_ShowRecentPosts() {?>
<div class="last">
<h3><span>Latest Post</span> <span class="infopost"><?php previous_posts_link('Previous //') ?> <?php next_posts_link('More') ?></span></h3>
<ul class="recent">
<?php
if(is_home()):
$postoff = $totale;
else:
$postoff = '';
endif;

$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();

$wp_query->query('showposts=10'.'&paged='.$paged.$postoff);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <?php the_time('d m'); ?></li>
<?php endwhile; ?>
</ul>
<?php if($postoff == $totale): ?>
  
</div>
<?php endif; ?>
<?php $wp_query = null; $wp_query = $temp;?>
<br class="clear" />
</div>

<?php }	
// WIDEGT OPTIONS
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name'=>'Sidebar Right',
        'before_widget' => '<li id="%1$s" class="boxr widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle"><span>',
        'after_title' => '</span></h3>'
	));
	
if ( function_exists('register_sidebar') )
    register_sidebar(array(
				'name' => 'Sidebar Bottom',
        'before_widget' => '<li id="%1$s" class="widget %2$s widget_bottom">',
        'after_widget' => '</li>',
        'before_title' => '<div class="h2-bg"><h2 class="widgettitle">',
        'after_title' => '</h2></div>',
    ));

}



function widget_mytheme_search() {
?>
    <form method="get" action="<?php bloginfo('url'); ?>/">
	<fieldset>
		<label class="hidden"></label>
		<input type="text" value="Search..." name="s" class="srcinput" /> 
		<input type="submit" value="GO!" class="srcbutton" />
	</fieldset>
</form>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');



define('HEADER_IMAGE', '%s/images/header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 850);
define('HEADER_IMAGE_HEIGHT', 190);
define('HEADER_TEXTCOLOR', 'FFF');

function admin_header_style() { ?>
<style type="text/css">
#headimg, #header {
	background: #EEE url(<?php header_image();?>) 0 0 no-repeat;
	height: <?php echo HEADER_IMAGE_HEIGHT;?>px;
	width: <?php echo HEADER_IMAGE_WIDTH;?>px;
	position: relative;
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>  
#header h1 a, #headimg h1 {
 	display: none;
}
#header .description {
	display: none;
}
<?php
} else {
?>  #header h1 a, #headimg h1 a {
	margin: 10px 20px 20px 20px;	
	font-size:36px;
	text-transform:uppercase;	
	font-family: Arial, Helvetica, sans-serif;
}
#header .description, #headimg #desc {
	color: #cccccc;	
	font-weight:bold;	
	font-style: normal;
	font-family: Arial, Helvetica, sans-serif;
	padding: 0 20px 0 20px;
}
<?php
}
?>
</style>
<?php }

function header_style() { ?>
<style type="text/css">
#header {
 background: #333 url(<?php header_image();
?>) 0 0 no-repeat;
 height: <?php echo HEADER_IMAGE_HEIGHT;
?>px;
 width: <?php echo HEADER_IMAGE_WIDTH;
?>px;
	position: relative;
}
 <?php if ( 'blank' == get_header_textcolor() ) {
?> #header h1 a, #header .description {
 display: none;
}
<?php
}
?>
</style>
<?php }
if ( function_exists('add_custom_image_header') ) {
  add_custom_image_header('header_style', 'admin_header_style');
} 

/* WordPress 2.7 and Later on */
function mytheme_comment($comment, $args, $depth) {  
   $avatar = get_avatar($comment,$size='40',$default="" );
   $path = get_template_directory_uri().'/images/'; //get the image folder of current theme
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
     <div id="div-comment-<?php comment_ID(); ?>">
      <div id="author-info" class="comment-author vcard">                 
         <?php 
           if ($avatar) 
             echo $avatar;
           else
             echo '<img alt="" src="' .$path. 'ping-track.png" class="avatar avatar-35 photo" width="35" height="35" />';
         ?>                      
         <?php comment_type(); ?> from <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
	 <div class="comment-meta commentmetadata">Posted at: <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>    

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php } 

/**
 * count for Trackback, pingback, comment, pings
 *
 * use it:
 * fb_comment_type_count('ping');
 * fb_comment_type_count('comment');
 */
if ( !function_exists('fb_comment_type_count') ) {
	function fb_get_comment_type_count($type='all', $post_id = 0) {
		global $cjd_comment_count_cache, $id, $post;
 
		if ( !$post_id )
			$post_id = $post->ID;
		if ( !$post_id )
			return;
 
		if ( !isset($cjd_comment_count_cache[$post_id]) ) {
			$p = get_post($post_id);
			$p = array($p);
			update_comment_type_cache($p);
		}
 
		if ( $type == 'pingback' || $type == 'trackback' || $type == 'comment' )
			return $cjd_comment_count_cache[$post_id][$type];
		elseif ( $type == 'pings' )
			return $cjd_comment_count_cache[$post_id]['pingback'] + $cjd_comment_count_cache[$post_id]['trackback'];
		else
			return array_sum((array) $cjd_comment_count_cache[$post_id]);
	}
 
	// comment, trackback, pingback, pings
	function fb_comment_type_count($type = 'all', $post_id = 0) {
		echo fb_get_comment_type_count($type, $post_id);
	}
}

 function update_comment_type_cache(&$queried_posts) {
global $cjd_comment_count_cache, $wpdb;

if ( !$queried_posts )
return $queried_posts;

foreach ( (array) $queried_posts as $post )
if ( !isset($cjd_comment_count_cache[$post->ID]) )
$post_id_list[] = $post->ID;

if ( $post_id_list ) {
$post_id_list = implode(',', $post_id_list);

foreach ( array('','pingback', 'trackback') as $type ) {
$counts = $wpdb->get_results("SELECT ID, COUNT( comment_ID ) AS ccount
FROM $wpdb->posts
LEFT JOIN $wpdb->comments ON ( comment_post_ID = ID AND comment_approved = '1' AND comment_type='$type' )
WHERE post_status = 'publish' AND ID IN ($post_id_list)
GROUP BY ID");

if ( $counts ) {
if ( '' == $type )
$type = 'comment';
foreach ( $counts as $count )
$cjd_comment_count_cache[$count->ID][$type] = $count->ccount;
}
}
}
return $queried_posts;
}
?>