
<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

slz_print( $data );

$unique_class = 'sc-ads-banner-carousel-' . SLZ_Com::make_id();
$extra_class = $data['extra_class'] ;
$sc_class = $extra_class . ' ' . $unique_class;
?>
<div class="slz-shortcode sc_ads_banner_carousel <?php echo esc_attr( $sc_class ); ?>">
ABC
</div>
