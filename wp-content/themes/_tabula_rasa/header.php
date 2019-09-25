<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>
<?php 
/**
 * 
 */
	// get the header settings field group (options page)
	$hS = get_field('header_settings', 'options');
	$classes = [
		'debug' // REMOVE IN PRODUCTION!!!
		,( !empty($hS['fade_in']) ? 'header-fadein' : '' )
		,( $hS['type'] ? $hS['type'] : '' )
	];
 ?>
<body <?php body_class($classes); ?>>
<?php
	// call in wp nav
	include('parts/nav.header.php');
 ?>