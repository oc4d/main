<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?> <?php wp_title('&raquo;', true, 'left'); ?> </title>
       <link rel="shortcut icon" href="favicon.ico" >
        <!-- CSS -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />    
		<?php if(is_front_page()) { ?>
		<style type="text/css">
        <!--
        #cu3er-container {width:900px; outline:0;}
        -->
        </style>
        <?php } ?>	
        
        <?php if(get_option('del_custom_css') != "") { ?>
        <!-- Custom CSS -->
        <style type="text/css">
		<?php echo get_option('del_custom_css'); ?>
		</style>
    	<?php } ?>
        
    <!-- Javscript -->
    
        <!-- Unit PNG Fix -->
        <!--[if lt IE 7]>
            <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/unitpngfix.js"></script>
        <![endif]-->
        
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/jquery.cycle.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/Cufon.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/Futura_Hv_BT_400.font.js"></script>  
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/swfobject/swfobject.js"></script>
    
    <?php if(is_page(get_option('del_portfolio_page'))) { ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/css/prettyPhoto.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
	});
    </script>
    <?php } ?>
	
	<?php if(is_page(get_option('del_contact_page'))) { ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style/css/validation.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/jquery.contact.js"></script>
    </script>
    <?php } ?>
    
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/custom.js"></script>    
    
    <?php if(is_front_page() && get_option('del_slider') == "3D XML Slider") { ?>
    <!-- configure SWFObject JavaScript and embed CU3ER slider -->
    <script type="text/javascript">
		var flashvars = {};
		flashvars.xml = "<?php bloginfo('template_directory'); ?>/style/config.xml";
		flashvars.font = "font.swf";
		var attributes = {};
		attributes.wmode = "transparent";
		attributes.id = "slider";
		swfobject.embedSWF("<?php bloginfo('template_directory'); ?>/style/cu3er.swf", "cu3er-container", "900", "350", "9", "expressInstall.swf", 				flashvars, attributes);
	</script>
	<?php } ?>
	<?php if(is_front_page() && get_option('del_slider') == "jQuery Fader") { ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#featured-alt').cycle({
			fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		});
	});
	</script>
	<?php } ?>
    
    <?php if(get_option('del_dropdown') == "Yes") { ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style/css/superfish.css" media="screen">
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/hoverIntent.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/style/js/superfish.js"></script>
		<script type="text/javascript">

		// initialise plugins
		jQuery(function(){
			jQuery('#nav').superfish();
		});

		</script>
	<?php } else { ?>
    	<style type="text/css">
		#nav li ul {
			display:none
		}
		</style>
	<?php } ?>
    
    <meta name="temp_url" content="<?php bloginfo('template_directory'); ?>" />
    
    <?php wp_head(); ?>
    
</head>

<body>

<div id="wrap"><!-- Start Wrap DIV -->
<div id="header-wrap"><!-- Start Header Wrap DIV -->
	<div id="header"><!-- Start Header DIV -->
		<!-- Your Logo Goes Here -->
		<div id="logo"><a href="<?php bloginfo('url'); ?>" title=""><img src="<?php echo get_option('del_logo_path'); ?>" alt="<?php bloginfo('name'); ?>" /></a></div>

		<ul id="nav"><!-- Top Navigation UL -->
        	<?php $args = array(
    		'title_li'     => '',
			'depth'        => ''
			);
			?> 
			<?php wp_list_pages($args); ?> 
        </ul>
	</div><!-- End Header DIV -->
</div> 