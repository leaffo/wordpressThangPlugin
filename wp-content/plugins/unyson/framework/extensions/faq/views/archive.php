<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$slz_container_css = slz_extra_get_container_class();
$limit_post        = slz_get_db_settings_option( 'faq-ac-limit-post', '' );
if ( empty( $limit_post ) ) {
	$limit_post = - 1;
}

get_header();
?>
    <div class="slz-main-content">
        <div class="container">
            <div class="slz-faq-archive <?php echo esc_attr( $slz_container_css['sidebar_layout_class'] ); ?>">
                    <div id="page-content" class="slz-content-column slz-widgets-left <?php echo esc_attr( $slz_container_css['content_class'] ); ?>">
                    	<div class="row">
							<?php
							$page_content = '';
							$term_slug    = get_query_var( 'term', '' );
							$sc_text      = sprintf( '[slz_faq_block category_slug="%s" icon_library="ionicons" icon_ionicons="ion-clipboard" limit_post="%s" display_title="n" pagination="y" display_readmore="n"]', $term_slug, $limit_post );
							$page_content .= do_shortcode( $sc_text );

							$term = get_term_by( 'slug', $term_slug, 'slz-faq-cat' );
							if ( $term ) {
								$child_terms = get_term_children( $term->term_id, 'slz-faq-cat' );
								if ( $child_terms ) {
									foreach ( $child_terms as $id ) {
										$child_term = get_term_by( 'id', $id, 'slz-faq-cat' );
										$sc_text      = sprintf( '[slz_faq_block category_slug="%s" icon_library="ionicons" icon_ionicons="ion-clipboard" limit_post="%s" display_title="y" display_readmore="n"]', $child_term->slug, $limit_post );
										$page_content .= do_shortcode( $sc_text );
									}
								}
							}

							if ( ! empty( $page_content ) ) {
								echo $page_content;
							} else {
								get_template_part( 'default-templates', 'no-content' );
							}
							?>
						</div>
                    </div>
					<?php if ( $slz_container_css['show_sidebar'] ) : ?>
                        <div id='page-sidebar'
                             class="slz-sidebar-column slz-widgets <?php echo esc_attr( $slz_container_css['sidebar_class'] ); ?>">
                            <div class="row">
								<?php dynamic_sidebar( $slz_container_css['sidebar'] ); ?>
							</div>
                        </div>
					<?php endif; ?>
                    <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php
get_footer();