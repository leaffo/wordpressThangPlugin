<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$taxonomy = 'slz-faq-cat';

$unique_class = 'slz-faq-block-' . SLZ_Com::make_id();
$sc_class     = $data['extra_class'] . ' ' . $unique_class;

/**
 * CUSTOM CSS
 */

$custom_css = '';
$custom_css .= ! empty( $data['title_color'] ) ? sprintf( '.%1$s .block-title { color:%2$s !important; }', esc_attr( $unique_class ), esc_attr( $data['title_color'] ) ) : '';
$custom_css .= ! empty( $data['title_color_hover'] ) ? sprintf( '.%1$s .block-title:hover { color:%2$s !important; }', esc_attr( $unique_class ), esc_attr( $data['title_color_hover'] ) ) : '';
$custom_css .= ! empty( $data['item_color'] ) ? sprintf( '.%1$s .faq-list li a { color:%2$s !important; }', esc_attr( $unique_class ), esc_attr( $data['item_color'] ) ) : '';
$custom_css .= ! empty( $data['item_color_hover'] ) ? sprintf( '.%1$s .faq-list li:hover a { color:%2$s !important; }', esc_attr( $unique_class ), esc_attr( $data['item_color_hover'] ) ) : '';
$custom_css .= ! empty( $data['icon_color'] ) ? sprintf( '.%1$s .faq-list li .icon { color:%2$s !important; }', esc_attr( $unique_class ), esc_attr( $data['icon_color'] ) ) : '';
$custom_css .= ! empty( $data['icon_color_hover'] ) ? sprintf( '.%1$s .faq-list li:hover .icon { color:%2$s !important; }', esc_attr( $unique_class ), esc_attr( $data['icon_color_hover'] ) ) : '';
$custom_css .= ! empty( $data['readmore_color'] ) ? sprintf( '.%1$s .btn-readmore { color:%2$s !important; }', esc_attr( $unique_class ), esc_attr( $data['readmore_color'] ) ) : '';
$custom_css .= ! empty( $data['readmore_color_hover'] ) ? sprintf( '.%1$s .btn-readmore:hover { color:%2$s !important; }', esc_attr( $unique_class ), esc_attr( $data['readmore_color_hover'] ) ) : '';
if ( ! empty( $custom_css ) ) {
	do_action( 'slz_add_inline_style', $custom_css );
}
?>
<div class="slz-shortcode sc-faq-block <?php echo esc_attr( $sc_class ); ?>">
	<?php
	$model = new SLZ_FAQ();
	$query_args = array(); $term_link = '';
    $sc_title = esc_html__('All Categories','slz');

	if ( ! empty( $data['category_slug'] ) ) {
		$term = get_term_by( 'slug', $data['category_slug'], $taxonomy );
		if ( $term ) {
            $query_args = array(
	            'tax_query' => array(
		            array(
			            'taxonomy' => $taxonomy,
			            'field'    => 'id',
			            'terms'    => $term->term_id,
		            )
	            )
            );
			$term_link = get_term_link( $term->term_id, $taxonomy );
            $sc_title = sprintf('<a href="%s">%s</a>', esc_url( $term_link ), esc_html( $term->name ) );
		}
	}

	if ( isset( $data['display_title'] ) && $data['display_title'] == 'y' ) {
		printf( '<h3 class="block-title">%s</h3>', $sc_title );
	}

	$model->init( $data, $query_args );
	if ( $model->query->have_posts() ):
		?>
        <ul class="faq-list">
			<?php
			while ( $model->query->have_posts() ):
				$model->query->the_post();
				$model->loop_index();

				$icon = $instance->get_icon_library_views( $data, '<i class="icon %1$s"></i>' );
				?>
                <li>
                    <a href="<?php echo $model->permalink; ?>"><?php echo $icon; ?><?php echo $model->get_title( array( 'title_format' => '%1$s' ) ); ?></a>
                </li>
			<?php endwhile; ?>
        </ul>
		<?php
		$model->pagination();
		$limit_post = intval( $data['limit_post'] );
        $found_post = $model->query->found_posts;
		if ( $term_link && $limit_post != -1 && $found_post > $limit_post && isset( $data['display_readmore'] ) && $data['display_readmore'] == 'y' ) {
			printf( '<a href="%s" class="btn-readmore">%s</a>', $term_link, esc_html__( 'SEE ALL ARTICLES', 'slz' ) );
		}
	endif;
	?>
</div>
