<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/18/2017
 * Time: 8:46 AM
 */


$sc = slz_ext( 'shortcodes' )->get_shortcode( 'a-slider-page' );
wp_enqueue_script( 'fucking_slider_page_js',
	$sc->locate_URI( '/static/js/thangjs.js' ),
	array( 'jquery' ),
	'',
	true );
wp_enqueue_style('fucking_slider_page_css',$sc->locate_URI('/static/css/thangcss.css'));



?>