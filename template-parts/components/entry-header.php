<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage brvry
 * @since 1.0.0
 */
 ?>

<?php if ( ! is_page() ) : ?>
<?php get_template_part('template-parts/components/entry', 'meta'); ?>
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php endif; ?>
