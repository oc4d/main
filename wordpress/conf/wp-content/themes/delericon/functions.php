<?php
automatic_feed_links();

include 'theme_options.php';

/*******************************************************
**********        ADD CUSTOM POST OPTIONS       ********
*******************************************************/

$new_meta_boxes_posts = 
array(
"post_image" => array(
"name" => "post_image",
"std" => "",
"title" => "Post Image",
"description" => "Enter the path to the post image. For Services posts, these should be 310px wide and 180px high. For Blog posts, these should be 250px wide and 215px high. For Portfolio posts, these should be 270px wide and 160px high."),

"full_image" => array(
"name" => "full_image",
"std" => "",
"title" => "Full Size Image",
"description" => "Enter the path to the full size image. <strong><em>Only for Portfolio posts!</em></strong>"),

"portfolio_link" => array(
"name" => "portfolio_link",
"std" => "",
"title" => "Portfolio Link",
"description" => "Enter the link to your portfolio. <strong><em>Only for Services posts!</em></strong>"),
);

function new_meta_boxes_posts() {
global $post, $new_meta_boxes_posts;

foreach($new_meta_boxes_posts as $meta_box) {
$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

if($meta_box_value == "")
$meta_box_value = $meta_box['std'];

echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

echo'<h4>'.$meta_box['title'].'</h4>';

echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';

echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
}
}

function create_meta_box_posts() {
global $theme_name;
if ( function_exists('add_meta_box') ) {
add_meta_box( 'new-meta-boxes-posts', 'Delericon Theme Options', 'new_meta_boxes_posts', 'post', 'normal', 'high' );
}
}

function save_postdata_posts( $post_id ) {
global $post, $new_meta_boxes_posts;

foreach($new_meta_boxes_posts as $meta_box) {
// Verify
if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
return $post_id;
}

if ( 'page' == $_POST['post_type'] ) {
if ( !current_user_can( 'edit_page', $post_id ))
return $post_id;
} else {
if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;
}

$data = $_POST[$meta_box['name'].'_value'];

if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
update_post_meta($post_id, $meta_box['name'].'_value', $data);
elseif($data == "")
delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
}
}

   add_action('admin_menu', 'create_meta_box_posts');  
   add_action('save_post', 'save_postdata_posts');  

/*******************************************************
**********     END ADD CUSTOM POST OPTIONS     *********
*******************************************************/

/*******************************************************
**********        ADD CUSTOM PAGE OPTIONS       ********
*******************************************************/

$new_meta_boxes = 
array(
"tagline" => array(
"name" => "tagline",
"std" => "",
"title" => "Tagline",
"description" => "Enter the tagline of your page which will appear at the top of the page."),

"subtagline" => array(
"name" => "subtagline",
"std" => "",
"title" => "Sub-tagline",
"description" => "Enter a sub-tagline that will appear right below the tagline at the top of the page.")
);

function new_meta_boxes() {
global $post, $new_meta_boxes;

foreach($new_meta_boxes as $meta_box) {
$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

if($meta_box_value == "")
$meta_box_value = $meta_box['std'];

echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

echo'<h4>'.$meta_box['title'].'</h4>';

echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';

echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
}
}

function create_meta_box() {
global $theme_name;
if ( function_exists('add_meta_box') ) {
add_meta_box( 'new-meta-boxes', 'Delericon Theme Options', 'new_meta_boxes', 'page', 'normal', 'high' );
}
}

function save_postdata( $post_id ) {
global $post, $new_meta_boxes;

foreach($new_meta_boxes as $meta_box) {
// Verify
if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
return $post_id;
}

if ( 'page' == $_POST['post_type'] ) {
if ( !current_user_can( 'edit_page', $post_id ))
return $post_id;
} else {
if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;
}

$data = $_POST[$meta_box['name'].'_value'];

if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
update_post_meta($post_id, $meta_box['name'].'_value', $data);
elseif($data == "")
delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
}
}

   add_action('admin_menu', 'create_meta_box');  
   add_action('save_post', 'save_postdata');  

/*******************************************************
**********     END ADD CUSTOM PAGE OPTIONS     *********
*******************************************************/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Blog Sidebar',	
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'name' => 'Non-Blog Sidebar',	
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));	
	
	
}
?>
