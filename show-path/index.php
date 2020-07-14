<?php

/*
Plugin Name: Show Path
Description: Show path
Version: 1.0
Author: jeremiechazelle.fr
Author URI: /
License: /
*/

/**
 * Show path shortcode
 */
add_shortcode('show-path', show_path);

function show_path($atts){
	$atts = shortcode_atts(array(
		'path' => ''
	), $atts);

	extract($atts);

    return '<span class="show-path">'.$path.'</span>';
}

/**
 * Show path style
 */
add_action( 'wp_enqueue_scripts', 'show_path_enqueue_styles' );

function show_path_enqueue_styles() {
    wp_register_style('show_path', plugins_url( '/css/show-path.css', __FILE__ ));

    wp_enqueue_style( 'show_path', get_stylesheet_uri());
}

/**
 * Show path register new button in the editor
 */
add_action( 'init', 'show_path_tinymce_shortcode_buttons' );

function show_path_tinymce_shortcode_buttons() {
    add_filter( 'mce_external_plugins', 'add_tinymce_show_path_script' );
    add_filter( 'mce_buttons', 'register_mce_button_show_path' );
}

function add_tinymce_show_path_script( $plugin_array ) {
    $plugin_array['show_path_mce_button_show_path'] = plugins_url( '/js/plugin-show-path-button.js', __FILE__ );

    return $plugin_array;
}

function register_mce_button_show_path( $buttons ) {
    array_push( $buttons, 'show_path_mce_button_show_path' );

    return $buttons;
}
