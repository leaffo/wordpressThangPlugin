<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/18/2017
 * Time: 8:46 AM
  */


$sc = slz_ext( 'shortcodes' )->get_shortcode( 'content-carousel' );




wp_enqueue_script( 'sc_content_carousel_slick_js',
	$sc->locate_URI( '/static/js/slick.js' ),
	array( 'jquery' ),
	'',
	true );



wp_enqueue_script( 'sc_content_carousel_js',
	$sc->locate_URI( '/static/js/sc_content_carousel.js' ),
	array( 'jquery' ),
	'',
	true );






wp_enqueue_style('sc_content_slick_css',$sc->locate_URI('/static/js/slick.css'));


wp_enqueue_style('sc_content_slick_theme_css',$sc->locate_URI('/static/js/slick-theme.css'));
?>