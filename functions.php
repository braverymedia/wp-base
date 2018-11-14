<?php
/**
 * brvry functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brvry
 */

if ( ! function_exists( 'brvry_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function brvry_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on brvry, use a find and replace
		 * to change 'brvry' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'brvry', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 980, 1200 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'site-menu' => esc_html__( 'Site Menu', 'brvry' ),
			'social-links' => esc_html__( 'Social Links Menu', 'brvry' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'brvry' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'brvry_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 400,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		// add_editor_style( 'assets/css/editor.css' );

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary Color', 'brvry' ),
					'slug'  => 'primary',
					'color' => brvry_hsl_hex( 'default' === get_theme_mod( 'colorscheme' ) ? 199 : get_theme_mod( 'colorscheme_primary_hue', 199 ), 100, 33 ),
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Excerpt support needed for navigation descriptions
		add_post_type_support( 'page', 'excerpt' );

	}
endif; // brvry_setup
add_action( 'after_setup_theme', 'brvry_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brvry_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 680 );
}
add_action( 'after_setup_theme', 'brvry_content_width', 0 );

if ( ! function_exists( 'brvry_register_image_sizes' ) ) :
	/*
	 * Enables support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	function brvry_register_image_sizes() {
		// Bubble images
		// add_image_size( 'brvry-square', 1000, 1000, true );
		// Heroes
		// add_image_size( 'brvry-hero', 1400, 500, true );
	}
	add_action( 'after_setup_theme', 'brvry_register_image_sizes' );

endif;

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function brvry_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widgets', 'brvry' ),
		'id'            => 'widget-area-1',
		'description'   => esc_html__( 'Add widgets here.', 'brvry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'brvry_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function brvry_webfonts() {
	// Google font URL to load
	$font_url = '';
}

function brvry_scripts() {
	// Get theme version
	$theme = wp_get_theme();
	$theme_version = $theme->get( 'Version' );

	wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/assets/js/modernizr.min.js', false, '3.6', false);
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'brvry-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	// wp_enqueue_style( 'brvry-webfonts', $font_url, array(), null, 'screen' );

	// See if we're on dev or not
	if ( SCRIPT_DEBUG || WP_DEBUG ) :

		wp_enqueue_style( 'brvry-style', get_template_directory_uri() . '/assets/css/wp-base.css', false, time(), 'all' );
		wp_enqueue_script( 'brvry-script', get_template_directory_uri() . '/assets/js/global.js', array(), time() );

	else :

		wp_enqueue_style( 'brvry-style', get_template_directory_uri() . '/assets/css/wp-base.css', false, $theme_version, 'all' );
		wp_enqueue_script( 'brvry-script', get_template_directory_uri() . '/assets/js/min/global.min.js', array(), $theme_version, true );

	endif;

}
add_action( 'wp_enqueue_scripts', 'brvry_scripts' );

/**
 * Enqueue supplemental block editor styles.
 */
function brvry_editor_customizer_styles() {

	wp_enqueue_style( 'brvry-editor-customizer-styles', get_theme_file_uri( '/assets/css/style-editor-customizer.css' ), false, '1.0', 'all' );

	if ( 'custom' === get_theme_mod( 'colorscheme' ) ) {
		// Include color patterns
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'brvry-editor-customizer-styles', brvry_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'brvry_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function brvry_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'colorscheme', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	if ( 'default' === get_theme_mod( 'colorscheme', 'default' ) ) {
		$primary_color = 199;
	} else {
		$primary_color = absint( get_theme_mod( 'colorscheme_primary_hue', 199 ) );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . $primary_color . '"' : ''; ?>>
		<?php echo brvry_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'brvry_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-brvry-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-brvry-walker-comment.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
