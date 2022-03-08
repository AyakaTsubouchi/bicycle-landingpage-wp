<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>

	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">

	<!-- Fontawsome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<?php

	if (is_front_page()) :
		$ayacat_classes = array('ayacat-class', 'my-class');
	else :
		$ayacat_classes = array('no-ayacat-class');
	endif;

	?>

<body <?php body_class($ayacat_classes); ?>>
	<header>
		<div class="header-one text-center">
			<p>Spring Sale! All Models 25% OFF</p>
			<!-- <p><?php the_widget('ayacat_widget_setup'); ?></p> -->
		</div>
		<div class="header-two">
			<div class="text-center">
				<h5><a class="navbar-brand" href="/">
						<?php
						$logo = get_custom_logo();
						$site_name = get_bloginfo("name");
						if (!$logo) {
							echo $site_name;
						} else {
							echo $logo;
						}
						?>
					</a></h5>

			</div>
		</div>
	</header>