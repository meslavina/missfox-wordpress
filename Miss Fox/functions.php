<?php

/*************************************
 * Theme setub
*************************************/
function missfox_setup() {

		// Automatic feed
		add_theme_support( 'automatic-feed-links' );

		// Set content-width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 620;

		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post-image', 620, 9999 );

		// Title tag
		add_theme_support( 'title-tag' );

		// Post formats
		add_theme_support( 'post-formats', array( 'aside' ) );

		// Make the theme translation ready
		load_theme_textdomain( 'missfox', get_template_directory() . '/languages' );

		$locale_file = get_template_directory() . "/languages/" . get_locale();

		if ( is_readable( $locale_file ) ) {
				require_once( $locale_file );
			}

		}
add_action( 'after_setup_theme', 'missfox_setup' );

/*************************************
 * Enqueue styles
*************************************/
function missfox_load_style() {
if ( ! is_admin() ) {
		wp_register_style( 'missfox_fonts', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' );
		wp_enqueue_style( 'missfox_style', get_stylesheet_uri(), array( 'missfox_fonts' ) );
	}
}
add_action( 'wp_print_styles', 'missfox_load_style' );

/****** Enqueue comment-reply.js ****/
function missfox_load_scripts(){
		if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
add_action( 'wp_print_scripts', 'missfox_load_scripts' );

/******* Custom logo ****************/
add_theme_support( 'custom-logo' );

function missfox_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'missfox_logo_setup' );

?>
