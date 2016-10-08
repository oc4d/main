<?php

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category...");

$pages = get_pages();
$wp_pages = array();
foreach ($pages as $page_list ) {
       $wp_pages[$page_list->ID] = $page_list->post_title;
}
array_unshift($wp_pages, "Choose a page...");


$themename = "Delericon";
$shortname = "del";
$options = array (


array(    "name" => "Main Options",
        "type" => "title"),

array(    "type" => "open"),

array(    "name" => "Path To Logo",
        "desc" => "Enter the path to your logo here.",
        "id" => $shortname."_logo_path",
        "std" => "",
        "type" => "text"),

array(    "name" => "Enable Dropdown Menu",
        "desc" => "Enable the dropdown menu?",
        "id" => $shortname."_dropdown",
        "type" => "select",		
		"options" => array('Yes', 'No'),		
        "std" => "Yes"),

array(    "name" => "Custom CSS",
        "desc" => "You can enter custom css rules here. <em>(ie. a {color:red;}</em><br />Do not use if you're not comfortable with CSS.<br /><em><strong>(Optional)</strong></em>",
        "id" => $shortname."_custom_css",
        "std" => "",
        "type" => "textarea"),
		
array(    "name" => "Google Analytics",
        "desc" => "Paste your Google Analytics code here.<br /><em><strong>(Optional)</strong></em>",
        "id" => $shortname."_analytics",
        "std" => "",
        "type" => "textarea"),		

array(    "name" => "Copyright in Footer",
        "desc" => "Enter the copyright text that you'd like to display in the footer.",
        "id" => $shortname."_copyright",
        "std" => "",
        "type" => "text"),

array(    "type" => "close"),



array(  "name" => "Homepage Options",
        "type" => "title"),

array(    "type" => "open"),

array( "name" => "Choose Homepage Slider",
	"desc" => "Choose a featured slider type for the homepage.",
	"id" => $shortname."_slider",
	"type" => "select",
	"options" => array('3D XML Slider', 'jQuery Fader'),
	"std" => "Choose..."),

array(    "name" => "Homepage Tagline",
        "desc" => "Enter a catchy tagline to display on the homepage.",
        "id" => $shortname."_homepage_tagline",
        "std" => "",
        "type" => "text"),

array(    "name" => "Column Left Title",
        "desc" => "Enter the title of the left column on the homepage here.",
        "id" => $shortname."_column_left_title",
        "std" => "",
        "type" => "text"),

array(    "name" => "Column Left Content",
        "desc" => "Enter the content of the left column on the homepage here. Remember to use paragraph tags to style it. Do NOT use quotation marks when defining attributes as Wordpress will add them automatically.",
        "id" => $shortname."_column_left_content",
        "type" => "textarea"),

array(    "name" => "Column Left Image",
        "desc" => "Enter the path to the image of the left column on the homepage here. It should be 260px wide and 80px high or a rough multiple.",
        "id" => $shortname."_column_left_image",
        "std" => "",
        "type" => "text"),

array(    "name" => "Column Middle Title",
        "desc" => "Enter the title of the middle column on the homepage here.",
        "id" => $shortname."_column_middle_title",
        "std" => "",
        "type" => "text"),

array(    "name" => "Column Middle Content",
        "desc" => "Enter the content of the middle column on the homepage here. Remember to use paragraph tags to style it. Do NOT use quotation marks when defining attributes as Wordpress will add them automatically.",
        "id" => $shortname."_column_middle_content",
        "type" => "textarea"),

array(    "name" => "Column Middle Image",
        "desc" => "Enter the path to the image of the middle column on the homepage here. It should be 260px wide and 80px high or a rough multiple.",
        "id" => $shortname."_column_middle_image",
        "std" => "",
        "type" => "text"),

array(    "name" => "Column Right Title",
        "desc" => "Enter the title of the right column on the homepage here.",
        "id" => $shortname."_column_right_title",
        "std" => "",
        "type" => "text"),

array(    "name" => "Column Right Content",
        "desc" => "Enter the content of the right column on the homepage here. Remember to use paragraph tags to style it. Do NOT use quotation marks when defining attributes as Wordpress will add them automatically.",
        "id" => $shortname."_column_right_content",
        "type" => "textarea"),

array(    "name" => "Column Right Image",
        "desc" => "Enter the path to the image of the right column on the homepage here. It should be 260px wide and 80px high or a rough multiple.",
        "id" => $shortname."_column_right_image",
        "std" => "",
        "type" => "text"),

array(    "type" => "close"),

array(  "name" => "Services Options",
        "type" => "title"),

array(    "type" => "open"),

array( "name" => "Choose Services Category",
	"desc" => "Choose the category for the posts on the Services page.",
	"id" => $shortname."_services_cat",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category..."),

array(    "type" => "close"),

array(  "name" => "Portfolio Options",
        "type" => "title"),

array(    "type" => "open"),

array( "name" => "Choose Portfolio Category",
	"desc" => "Choose the category for the posts on the Portfolio page.",
	"id" => $shortname."_portfolio_cat",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category..."),

array( "name" => "Select Portfolio Page",
	"desc" => "Select the page you're using to display your portfolio.",
	"id" => $shortname."_portfolio_page",
	"type" => "select",
	"options" => $wp_pages,
	"std" => "Choose a page..."),

array(    "type" => "close"),

array(  "name" => "Blog Options",
        "type" => "title"),

array(    "type" => "open"),

array(    "name" => "Blogpage Tagline",
        "desc" => "Enter a catchy tagline to display on the blogpage.",
        "id" => $shortname."_blogpage_tagline",
        "std" => "",
        "type" => "text"),

array(    "name" => "Blogpage Sub-Tagline",
        "desc" => "Enter a catchy sub-tagline to display on the blogpage.",
        "id" => $shortname."_blogpage_subtagline",
        "std" => "",
        "type" => "text"),

array(    "type" => "close"),

array(  "name" => "Contact Options",
        "type" => "title"),

array(    "type" => "open"),

array( "name" => "Select Contact Page",
	"desc" => "Select the page you're using to display your contact page.",
	"id" => $shortname."_contact_page",
	"type" => "select",
	"options" => $wp_pages,
	"std" => "Choose a page..."),

array(    "name" => "Contact E-mail",
        "desc" => "Enter the e-mail address for the quick contact form on the contact page.",
        "id" => $shortname."_contact_email",
        "std" => "",
        "type" => "text"),

array(    "name" => "Contact Sidebar",
        "desc" => "Enter the content of the sidebar on the contact page. You can use HTML to style it. Do NOT use quotation marks when defining attributes as Wordpress will add them automatically.",
        "id" => $shortname."_contact_sidebar",
        "std" => "",
        "type" => "textarea"),

array(    "type" => "close")

);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=theme_options.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=theme_options.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">

<?php foreach ($options as $value) {


switch ( $value['type'] ) {

case "open":
?>
<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">

<?php break;

case "close":
?>

</table><br />

<?php break;

case "title":
?>

<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
    <td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
    <tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;

}
}
?>

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

add_action('admin_menu', 'mytheme_add_admin'); 

?>