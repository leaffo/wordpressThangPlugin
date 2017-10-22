<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>
<?php
/**
 * The template for displaying the service detail content
 *
 */

$instance  = slz()->extensions->get( 'services' );
get_header();
$slz_container_css = slz_extra_get_container_class();
?>
<div class="slz-main-content padding-top-100 padding-bottom-100">
	<div class="container">
		<div class="slz-blog-detail slz-services <?php echo esc_attr( $slz_container_css['sidebar_layout_class'] ); ?>">
			<div class="row">
				<div id="page-content" class="slz-content-column <?php echo esc_attr( $slz_container_css['content_class'] ); ?>">
					<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post();
					?>
							<div class="service-detail-wrapper">
								<?php 
									echo slz_render_view( $instance->locate_path('/views/gallery-item.php'), array('instance' => $instance) );
									the_title( '<h1 class="title">', '</h1>' );
								?>
								<div class="entry-content">
									<?php
										the_content( sprintf( '<a href="%s" class="read-more">%s<i class="fa fa-angle-right"></i></a>',
														get_permalink(),
														esc_html__( 'Continue reading', 'slz' )
												) );

										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'slz' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</div>
								<?php
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
							</div>

					<?php 
							endwhile;
							wp_reset_postdata();
						else: 
							get_template_part( 'default-templates', 'no-content' );  
						endif; // have_posts
					?>

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