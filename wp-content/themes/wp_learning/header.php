<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?>>
    <div class="wrapper">
		<header id="header" class="header-area absulate-header animated cssanimation">
			<?php get_template_part('template-parts/header/header', 'main'); ?>
		</header>
