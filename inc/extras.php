<?php
/**
 * Various branding and tweaks
 *
 *
 * @package brvry
 */

/**
 * Enqueues jQuery in the footer instead of the header
 */

function brvry_enqueue_jquery_in_footer( &$scripts ) {

    if ( ! is_admin() )
        $scripts->add_data( 'jquery', 'group', 1 );
}
add_action( 'wp_default_scripts', 'brvry_enqueue_jquery_in_footer' );


/**
 * Defers our scripts so they don't break loading.
 * This is meant to be a speed optimization.
 *
 */

function brvry_script_tag_defer($tag, $handle) {
    if (is_admin()){
        return $tag;
    }
    if (strpos($tag, '/wp-includes/js/jquery/jquery')) {
        return $tag;
    }
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.') !==false) {
        return $tag;
    }
    else {
        return str_replace(' src',' defer src', $tag);
    }
}
add_filter('script_loader_tag', 'brvry_script_tag_defer',10,2);


/**
 * Adds the slug as a body class
 *
 */

function brvry_post_classes( $classes ) {
	if ( is_single() || is_page() ) {
		global $post;
		$slug = $post->post_name;
		$classes[] = 'post-' . $slug;
	}

	return $classes;
}
add_filter( 'post_class', 'brvry_post_classes' );

// Custom Login Styles
function brvry_login_stylesheet() {
    wp_enqueue_style( 'brvry-login', get_template_directory_uri() . '/assets/css/bravery-login.css' );
}
add_action( 'login_enqueue_scripts', 'brvry_login_stylesheet' );

// Edit login page logo url
function brvry_login_logo_url() {
	return 'http://braverymedia.co';
}
add_filter('login_headerurl', 'brvry_login_logo_url');

function brvry_login_logo_tooltip() {
	return 'Site by Bravery Media';
}

// customize admin footer text
function brvry_admin_footer() {
	echo '<a href="http://braverymedia.co/?ref=ctheme" title="Built with Bravery" target="_blank">Built with Bravery.</a>';
}
add_filter('admin_footer_text', 'brvry_admin_footer');

// enable html markup in user profiles
remove_filter('pre_user_description', 'wp_filter_kses');

// admin link for all settings
function brvry_all_settings_link() {
	add_theme_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'brvry_all_settings_link');

// Remove paragraphs from img or iframes
function brvry_filter_ptags_on_images($content) {
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
// add_filter('the_content', 'brvry_filter_ptags_on_images');

// Allow SVG Uploads
function brvry_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'brvry_mime_types');
