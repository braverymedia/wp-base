<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package brvry
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'brvry' ); ?></h1>
				</header><!-- .page-header -->

				<div class="entry-content">
					<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
				</div><!-- .widget -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
