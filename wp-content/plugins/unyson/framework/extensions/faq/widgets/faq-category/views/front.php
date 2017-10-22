<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$taxonomy = 'slz-faq-cat';

$categories_slug = array();
if ( ! empty( $category_slug ) ) {
	$categories_slug = $category_slug;
}

echo wp_kses_post( $before_widget );
?>
    <div class="widget slz-widget-faq-category-<?php echo esc_attr( $unique_id ); ?>">
		<?php echo wp_kses_post( $block_title ); ?>
        <div class="widget-content clearfix">
			<?php
			if ( ! empty( $categories_slug ) && count( $categories_slug ) == 1 && $categories_slug[0] == '' ) {
				$categories_arr = get_terms( array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => true,
					'orderby'    => 'order_number',
				) );
				foreach ( $categories_arr as $item ) {
					$links = get_category_link( $item->term_id );
					$icon  = slz_get_db_term_option( $item->term_id, $taxonomy, 'icon', '' );
					if ( ! empty( $icon ) ) {
						$icon = sprintf( '<i class="icons %s"></i>', $icon );
					}
					printf( '<a href="%s" class="link">%s <span class="text">%s</span></a>', esc_url( $links ), $icon, esc_html( $item->name ) );
				}
			} elseif ( ! empty( $categories_slug ) ) {
				foreach ( $categories_slug as $cat ) {
				    if( empty( $cat ) ) { continue; }

					$cat = get_term_by( 'slug', $cat, $taxonomy );
					if ( $cat ) {
						$links = get_category_link( $cat->term_id );
						$icon  = slz_get_db_term_option( $cat->term_id, $taxonomy, 'icon', '' );
						if ( ! empty( $icon ) ) {
							$icon = sprintf( '<i class="icons %s"></i>', $icon );
						}

						printf( '<a href="%s" class="link">%s <span class="text">%s</span></a>', esc_url( $links ), $icon, esc_html( $cat->name ) );
					}
				}
			}
			?>
        </div>
    </div>

<?php
echo wp_kses_post( $after_widget );

?>