<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package brvry
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'brvry' ); ?></a>

	<header id="masthead" class="primary<?php echo is_singular() && brvry_can_show_post_thumbnail() ? ' site-header featured-image' : ' site-header'; ?>">
		<?php
			/**
			 * Include logo and branding, then site navigation
			**/
			get_template_part('template-parts/components/site', 'branding');
			get_template_part('template-parts/components/site', 'nav');
		?>

		<?php
			/**
			 *  Image or blank for page header.
			 **/
			if ( is_singular() && brvry_can_show_post_thumbnail() && has_post_thumbnail() ) : ?>
			<div class="page-cover-image">
				<?php brvry_post_thumbnail(); ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		<?php endif; ?>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
