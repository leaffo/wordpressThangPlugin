<?php 
$related_option = slz_get_db_settings_option('pf-related-post','');
if( empty($related_option) ) {
	return;
}
$post_id           = get_the_ID();
$show_related = slz_akg('status',$related_option, '' );

if ( $show_related == 'show'  ){

	$filter = $limit = $filter_value = '';
	$column = absint(slz_akg('show/column',$related_option, '' ));
	if( empty($column)) {
		$column = 3;
	}
	if( $str_limit = slz_akg('show/limit',$related_option, '' ) ) {
		$limit = intval($str_limit);
	}
	if( empty( $limit ) ){
		$limit = get_option('posts_per_page');
	}
	$filter_by = slz_akg('show/filter-by',$related_option, '' );

	if( $filter_by == 'category' ){

		$category_slug = '';
		$portfolio_categories = get_the_terms ( $post_id, 'slz-portfolio-cat' );
		if( !empty( $portfolio_categories ) ) {
			foreach( $portfolio_categories as $cat ){
				$slug[] = $cat->slug;
			}
			$category_slug = implode( ',', $slug );
		}
		$filter = 'category_slug="%1$s"';
		$filter_value = $category_slug;

	}else{

		$filter = 'author="%1$s"';
		$filter_value = get_post_field( 'post_author', $post_id );

	}

	$portfolio_recent =  do_shortcode( sprintf('[slz_portfolio_carousel layout="layout-1" show_category="yes" show_thumbnail="thumbnail" show_description="no" '.$filter.' slide_to_show="%3$s" limit_post="%4$s" post__not_in="%2$s" slide_dots="yes" slide_arrows="yes"]',esc_attr( $filter_value ),esc_attr( $post_id ), esc_attr($column),esc_attr($limit) ));
	if( $portfolio_recent ) {?>
		<div class="related-portfolio-wrapper">
			<?php 
				$title = slz_akg('show/title',$related_option, '' );
				if(!empty($title)){
					echo '<div class="title">';
					echo esc_attr($title);
					echo '</div>';
				}
				echo '<div class="related-portfolio">' .$portfolio_recent.'</div>';
			?>
			<div class="clearfix"></div>
		</div><?php
	}?>
<?php }?>