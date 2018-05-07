<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package brvry
 */

if ( ! is_active_sidebar( 'widget-area-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'widget-area-1' ); ?>
</div><!-- #secondary -->
