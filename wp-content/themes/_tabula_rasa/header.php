<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<?php

		$classes = [
			'debug' // REMOVE IN PRODUCTION!!!
		];

		wp_head();
	?>
</head>

<body <?php body_class($classes); ?>>
	<?php
		include('parts/nav.header.php');
	?>