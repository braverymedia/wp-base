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
<div class="entry-meta">
  <?php brvry_posted_on(); ?>
	<?php brvry_posted_by(); ?>
	<?php
  // @TODO add category list

	// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'brvry' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . brvry_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	?>
</div><!-- .meta-info -->
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php endif; ?>
