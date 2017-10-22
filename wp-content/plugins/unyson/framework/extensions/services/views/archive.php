<?php if ( ! defined( 'SLZ' ) ) {
	exit; // Exit if accessed directly
} ?>
<?php
/**
 * The template for displaying the service archive content
 *
 *
 * @package WordPress
 * @subpackage solazu-unyson
 * @since 1.0
 */

get_header();
$slz_container_css = slz_extra_get_container_class();

$ext = slz()->extensions->get( 'services' );
$taxonomy = $ext->get_taxonomy_name();

//check exists taxonomy
$slz_category_slug = '';
if( is_tax( $taxonomy ) ){
	$queried_object   = get_queried_object();	
	$slz_category_slug =  $queried_object->slug;
}

$column = intval( slz_get_db_settings_option('service-ac-column', '') );
if( empty( $column ) ){
	$column = 3;
	if ( ! $slz_container_css['show_sidebar'] ){
		$column = '4';
	}
}
$limit_post = intval( slz_get_db_settings_option('service-ac-limit-post', '') );
if( empty( $limit_post ) ){
	$limit_post = get_option('posts_per_page');
}
?>
<div class="slz-main-content padding-top-100 padding-bottom-100">
	<div class="container">
		<div class="slz-services-archive <?php echo esc_attr( $slz_container_css['sidebar_layout_class'] ); ?>">
			<div class="row">
				<div id="page-content" class="slz-content-column <?php echo esc_attr( $slz_container_css['content_class'] ); ?>">
					<div class="service-archive-wrapper">
						<?php
						$slz_shortcode = sprintf('[slz_service_block layout="layout-2" layout-2-style="st-pune" category_slug="%1$s" column="%2$s" limit_post="%3$s" btn_content="%4$s" show_icon="feature-image" description="excerpt" pagination="yes"]',
							esc_attr( $slz_category_slug ),
							esc_attr( $column ),
							esc_attr( $limit_post ),
							esc_html__( 'Read More', 'slz' )
						);
						echo do_shortcode( $slz_shortcode ); ?>
					</div>
				</div>
				<?php if ( $slz_container_css['show_sidebar'] ) :?>
					<div id='page-sidebar' class="slz-sidebar-column slz-widgets <?php echo esc_attr( $slz_container_css['sidebar_class'] ); ?>">
						<?php dynamic_sidebar( $slz_container_css['sidebar'] ); ?>
					</div>
				<?php endif; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>