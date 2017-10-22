<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}

$slz_container_css = slz_extra_get_container_class();

$post_id = get_the_ID();
$model   = new SLZ_FAQ();
$model->init( array(
	'post_id' => array( $post_id )
) );

$html_options = array(
	'content_format'           => '%1$s',
	'content_more_link_format' => '<a href="%1$s" class="read-more">%2$s<i class="ion-ios-arrow-thin-right"></i></a>',
	'content_more_link_text'   => esc_html__( 'Continue reading', 'slz' ),
	'entry_time'               => esc_html__( 'Updated', 'slz' ) . ' %s ' . esc_html__( 'ago', 'slz' ),
);

get_header();
?>
    <div class="slz-main-content">
        <div class="container">
            <div class="slz-faq-detail <?php echo esc_attr( $slz_container_css['sidebar_layout_class'] ); ?>">
                <div id="page-content"
                     class="slz-content-column slz-widgets-left <?php echo esc_attr( $slz_container_css['content_class'] ); ?>">
					<?php if ( $model->query->have_posts() ): while ( $model->query->have_posts() ): $model->query->the_post();
						$model->loop_index(); ?>
                        <div class="row">
                            <div class="faq-detail-wrapper">
                                <div class="entry-content">
									<?php $model->get_content( $html_options, true ); ?>
                                    <footer class="entry-footer">
                                        <div class="entry-time">
											<?php $model->get_entry_time( $html_options, true ); ?>
                                        </div>
										<?php edit_post_link( __( 'Edit', 'slz' ), '<span class="edit-link">', '</span>' ); ?>
                                    </footer>
                                </div>
                            </div>
                            <div class="slz-post-footer">
								<?php $model->get_faq_feedback(); ?>
                                <div class="related-article">
									<?php
									$relateds = $model->get_related_articles();
									if ( $relateds->query->have_posts() ) {
										printf( '<h3 class="block-title">%s</h3>', esc_html__( 'Related Articles', 'slz' ) );
										?>
                                        <ul class="faq-list">
											<?php
											while ( $relateds->query->have_posts() ) {
												$relateds->query->the_post();
												$relateds->loop_index();

												?>
                                                <li>
                                                    <a href="<?php echo $relateds->permalink; ?>"><i class="icon ion-android-clipboard"></i> <?php echo $relateds->get_title( array( 'title_format' => '%1$s' ) ); ?></a>
                                                </li>
												<?php
											}
											$relateds->reset();
											?>
                                        </ul>
										<?php
									}
									?>
                                </div>
                            </div>
                        </div>
					<?php endwhile;
						$model->reset();
					else: get_template_part( 'default-templates', 'no-content' ); endif; ?>
                </div>
				<?php if ( $slz_container_css['show_sidebar'] ) : ?>
                    <div id='page-sidebar'
                         class="slz-sidebar-column slz-widgets <?php echo esc_attr( $slz_container_css['sidebar_class'] ); ?>">
						<?php dynamic_sidebar( $slz_container_css['sidebar'] ); ?>
                    </div>
				<?php endif; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php
get_footer();