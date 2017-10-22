<?php
$header_class = $main_menu_class = '';
$search_icon = 'fa fa-search';
$transparent = false;

if ( !empty ( $search_style['icon-class'] ) ) {
	$search_icon = $search_style['icon-class'];
}

list($header_class,$transparent) = slz_get_header_transparent(slz_get_db_settings_option('slz-header-style-group/slz-header-style',''));

// sub header
$subheader_icon = $subheader_class = $subheader_mask = '';
if( slz_akg( 'enable-subheader/enable', $options, '' ) == 'show' ):
	$subheader_class = 'slz-has-subheader';
	$subheader_icon = 
		'<a href="#" class="slz-menu-icon">
			<span class="line"></span>
			<span class="line"></span>
			<span class="line"></span>
		</a>';
	$subheader_mask = '<div class="subheader-mask"></div>';
endif;
$enable_topbar = false;
$vcc_account_html = SLZ_Com::get_woo_account(false);

$btn_donation = array();
if (function_exists('slz_theme_render_donation_button_topbar')) {
    $btn_donation = slz_theme_render_donation_button_topbar($options);
}


$banner_event_topbar_left_html = '';
$banner_event_topbar_right_html = '';
if (function_exists('slz_theme_render_banner_event_topbar')) {
    $enable_banner_event_topbar_left = slz_akg('enable-header-top-bar/yes/left-position', $options, '');
    $enable_banner_event_topbar_right = slz_akg('enable-header-top-bar/yes/right-position', $options, '');

    if ( isset($enable_banner_event_topbar_left) && is_array($enable_banner_event_topbar_left) && in_array('event-banner', $enable_banner_event_topbar_left)  ) {
        $banner_event_topbar_left_html = slz_theme_render_banner_event_topbar($options);
    }
    if ( isset($enable_banner_event_topbar_right) && is_array($enable_banner_event_topbar_right) && in_array('event-banner', $enable_banner_event_topbar_right)  ) {
        $banner_event_topbar_right_html = slz_theme_render_banner_event_topbar($options);
    }
}

$enable_topbar_menu_mobile = slz_akg('enable-header-top-bar/yes/show_topbarmenu_menu_mobile', $options, false);
if ($enable_topbar_menu_mobile) {
    $header_mobile_class = ' slz-header-mobile-topbar';
    $header_class .= esc_attr($header_mobile_class);
}

$top_bar = slz_akg('enable-header-top-bar/selected-value', $options, 'no' );
$top_bar_page = slz_get_db_post_option( get_the_ID() ,'page-topbar');
if (!empty($top_bar_page)) {
	if ($top_bar_page == 'hide') {
		$top_bar = 'no';
	}
	else {
		$top_bar = 'yes';
	};
}
SLZ_Live_Setting::get_top_bar($top_bar);
//sticky
$header_sticky = '';
if ( slz_akg('enable-sticky-header', $options, '') == 'yes' ){
	$header_sticky = 'slz-header-sticky';
}
$fixed_header = slz_get_db_post_option( get_the_ID() ,'page-fix-header');
if( $fixed_header == 'yes') {
	$header_sticky .= ' slz-header-onepage';
}
SLZ_Live_Setting::get_header_animation($header_sticky);
//menu align
$menu_styling = slz_get_page_menu_styling($options['menu-styling']);
$menu_align =  slz_akg('dropdown-align', $menu_styling, '');
if( $menu_align == 'left') {
	$main_menu_class .= ' slz-menu-left';
}
if( ! slz_theme_has_menu( 'main-nav', $options ) ) {
	$header_class .= ' slz-no-main-menu';
}
?>
<header>
	<div class="slz-header-wrapper slz-header-main slz-header-table  <?php echo esc_attr($header_class);?>">
		<div class="slz-header-table-cell-1">
            <div class="slz-hamburger-menu">
                <div class="bar"></div>
            </div>
            <div class="slz-main-menu-mobile">
                <?php
                if ( $top_bar == 'yes' && apply_filters('slz_ext_headers_disable_top_bar', true)) :
                    $enable_topbar = true;
                    if ($enable_topbar_menu_mobile == true) :?>
	                    <div class="slz-mobile-topbar">
	                        <div class="slz-topbar-list float-l">
	                            <?php echo slz_display_topbar_content('social', slz_akg('yes/left-position', $topbar, array()),
	                            					array('customize-icon' => slz_akg('yes/customize-icon', $topbar, array()),
	                            						'button'=>slz_akg('yes/button', $topbar, array()),
	                            						'other'=>slz_akg('yes/other/left-content', $topbar, array()),
	                            						'menu' => slz_akg('yes/menu', $topbar, array())
	                            ) ); ?>
	                            <?php
		                        if (!empty($banner_event_topbar_left_html)) {
		                            echo ( $banner_event_topbar_left_html );
		                        }
		                        ?>
	                        </div>
	                        <div class="slz-topbar-list float-r">
	                            <?php echo slz_display_topbar_content('social', slz_akg('yes/right-position', $topbar, array()),
	                            					array('customize-icon' => slz_akg('yes/customize-icon', $topbar, array()),
	                            						'button'=>slz_akg('yes/button', $topbar, array()),
	                            						'other'=>slz_akg('yes/other/right-content', $topbar, array()),
	                            						'menu' => slz_akg('yes/menu', $topbar, array())
	                            ) );
	                            // wpml language
	                            if(has_action('wpml_add_language_selector')) {
	                                $show_laguage_switcher = slz_get_db_settings_option('enable-wpml', '');
	                                if($show_laguage_switcher == 'yes'){
	                                    echo '<div class="wpml-language item">';
	                                    do_action('wpml_add_language_selector');
	                                    echo '</div>';
	                                }
	                            }?>
	                            <?php
	                            echo ( $vcc_account_html );
                                if ( isset($btn_donation['button']) ) {
                                    echo ( $btn_donation['button'] );
                                }
	                            ?>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
                        <?php
                    endif;
                endif;
                ?>
                <div class="nav-wrapper">
					<div class="nav-search">
						<?php get_search_form(true); ?>
					</div>
				</div>
            	<?php slz_theme_nav_menu( 'main-nav', $options ); ?>
            </div>
            <?php echo slz_get_logo( 'slz-logo-wrapper', $transparent ); ?>
        </div>
        <div class="slz-header-table-cell-2">
        	<?php
			if ( $enable_topbar) :
                $enable_topbar = true;
            ?>
				<div class="slz-header-topbar">
					<div class="slz-topbar-list float-l">
						<?php echo slz_display_topbar_content('social', slz_akg('yes/left-position', $topbar, array()), array('customize-icon' => slz_akg('yes/customize-icon', $topbar, array()),'button'=>slz_akg('yes/button', $topbar, array()))); ?>
                        <?php
                        if (!empty($banner_event_topbar_left_html)) {
                            echo ( $banner_event_topbar_left_html );
                        }
                        ?>
                    </div>
					<div class="slz-topbar-list float-r">
						<?php echo slz_display_topbar_content('social', slz_akg('yes/right-position', $topbar, array()), array('customize-icon' => slz_akg('yes/customize-icon', $topbar, array()),'button'=>slz_akg('yes/button', $topbar, array())));
						// wpml language
						if(has_action('wpml_add_language_selector')) {
							$show_laguage_switcher = slz_get_db_settings_option('enable-wpml', '');
							if($show_laguage_switcher == 'yes'){
								echo '<div class="wpml-language item">';
									do_action('wpml_add_language_selector');
								echo '</div>';
							}
						}?>
						<?php
                        echo ( $vcc_account_html );
                        if (!empty($banner_event_topbar_right_html)) {
                            echo ( $banner_event_topbar_right_html );
                        }

                        if ( isset($btn_donation['button']) ) {
                            echo ( $btn_donation['button'] );
                        }

                        if ( isset($btn_donation['model']) ) {
                            echo ( $btn_donation['model'] );
                        }
                        ?>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endif; ?>
			<!-- main menu -->

			<?php
			if( empty($options['show-main-menu']) || (!empty($options['show-main-menu']) && $options['show-main-menu'] == 'show')):?>
				<div class="slz-header-main <?php echo esc_attr($header_sticky).' '.esc_attr($subheader_class);?>">

					<div class="slz-main-menu <?php echo esc_attr($main_menu_class)?>">
						<?php slz_theme_nav_menu( 'main-nav', $options ); ?>

						<?php if ( slz_akg('enable-search', $options, 'no' ) == 'yes') : ?>

							<div class="slz-button-search"><i class="icons <?php echo esc_attr($search_icon); ?>"></i></div>

							<!-- <div class="nav-wrapper nav-search-full hide"> -->
							<div class="nav-wrapper hide">

								<div class="nav-search">

									<?php get_search_form(true); ?>

								</div>

							</div>
							
						<?php endif; ?>

						<div class="clearfix"></div>
					</div>

					<!-- sub header icon -->
					<?php echo wp_kses_post($subheader_icon);?>

				</div>
			<?php endif;?>

			<!-- sub header -->
			<?php echo wp_kses_post($subheader_mask);?>
			<?php if( slz_akg( 'enable-subheader/enable', $options, '' ) == 'show' ):?>
				<div class="slz-sub-header slz-sub-menu slz-main-menu">
					<div class="slz-navbar-wrapper">
		                <div class="slz-menu-wrapper">
		                <!-- contact -->
							<?php if( slz_akg( 'enable-subheader/show/enable-contact', $options, '' ) == 'show' ):?>
									<div class="contact">
									<a href="#" class="slz-close-contact">
			                            <span class="line"></span>
			                            <span class="line"></span>
			                            <span class="line"></span>
		                            </a>
		                            <div class="inner">
		                            	<!-- contact form -->
										<?php 
											$contact_form =  slz_akg( 'enable-subheader/show/contact-form', $options, '' ); 
											if( !empty( $contact_form ) &&  is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) :
												echo '<div class="contact-form">';
													echo do_shortcode('[contact-form-7 id="'.$contact_form.'"]');
												echo '</div>';
											endif;
										?>
		                            </div>
										
									</div>
							<?php endif;?>
		                    <div class="inner">
		                        <div class="menu-heading">
		                            <div class="action-top">
			                            <a href="#" class="slz-menu-icon">
				                            <span class="line"></span>
				                            <span class="line"></span>
				                            <span class="line"></span>
			                            </a>
										<?php if( slz_akg( 'enable-subheader/show/enable-contact', $options, '' ) == 'show' ):?>
											<?php
												$btn_text = slz_akg( 'enable-subheader/show/contact-text', $options, '' ); ?>
												<a href="" class="slz-btn btn-contact-toggle"><span class="btn-text"><?php echo esc_attr($btn_text);?></span>
												</a>
										<?php endif;?>
		                               
		                            </div>

		                            <!-- add short code -->

		                            <div class="app-post">
										<?php 
											$shortcode = slz_akg( 'enable-subheader/show/add_shortcode', $options, '' );
											if( !empty( $shortcode) ):
												echo '<div class="sc-content">';
												echo do_shortcode( $shortcode );
												echo '</div>';
											endif;
										?>
		                            </div>
		                        </div>
		                        <div class="menu-body">
		                            <!-- sub menu -->
									<?php if( slz_akg( 'enable-subheader/show/enable-submenu', $options, '' ) == 'show' ):?>
										<!-- hamburger menu mobile-->
						                <div class="slz-sub-menu-mobile"> 
											<?php slz_theme_nav_menu( 'sub-nav', $options, 'enable-subheader/show/menu-list' ); ?>
						                </div>
										<div class="slz-sub-menu">
											<?php slz_theme_nav_menu( 'sub-nav', $options, 'enable-subheader/show/menu-list' ); ?>
										</div>
										<div class="clearfix"></div>
									<?php endif;?>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
			<?php endif;?>

			<!-- end sub header -->
		
		</div>
	</div>
	<?php
	if( slz_ext( 'headers' )->get_config('enable_breakingnews') ) {
		if( $options['enable-breaking-news'] == 'yes' ) {
			if( !empty( $options['breaking-news-options']['style-breaking-news'] ) ) {
				$breaking_news_style = $options['breaking-news-options']['style-breaking-news'];
				$out = '';
				$attribute = array(
					'thumb-size' => array(
						'large' => slz()->theme->manifest->get('prefix').'-thumb-350x350',
						'no-image-large' => 'thumb-350x350.png',
					)
				);
				
				//breakingnews style 1
				if( $breaking_news_style == 'style-1' ) {
					$out .= '<div class="slz-breaking-news-01 slz-carousel-wrapper slz-carousel-author">';
						$out .= '<div class="text-label">'. esc_html__( 'Breaking news:', 'slz' ) .'</div>';
						$out .= '<div class="carousel-overflow">';
							$out .= '<div data-slidestoshow="4" class="slz-carousel">';
	
							if( !empty( $breaking_news_query->posts ) ) {
								foreach ( $breaking_news_query->posts as $post ) {
									$module = new SLZ_Block_Module( $post, $attribute );
									
									$out .= '<div class="item">';
										$out .= '<div class="slz-block-item-01 style-2">';
											$out .= '<div class="block-image">';
												$out .= '<a href="'. esc_url( $module->permalink ) .'" class="link">';
													$out .= $module->get_featured_image();
												$out .= '</a>';
											$out .= '</div>';
											$out .= '<div class="block-content">';
												$out .= '<div class="block-content-wrapper">';
													$out .= $module->get_category();
													$out .= $module->get_title();
												$out .= '</div>';
											$out .= '</div>';
										$out .= '</div>';
									$out .= '</div>';
								}// end foreach
							}// end if
	
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				
				//breakingnews style 2
				}elseif ( $breaking_news_style == 'style-2' ) {
					$out .= '<div class="slz-breaking-news-02">';
						$out .= '<div class="breaking-news-wrapper">';
							$out .= '<div class="text-label">'. esc_html__( 'breaking news:', 'slz' ) .'</div>';
							$out .= '<div class="wrapper-news">';
								$out .= '<div class="vticker">';
									$out .= '<ul class="list-unstyled">';
	
										if( !empty( $breaking_news_query->posts ) ) {
											foreach ( $breaking_news_query->posts as $post ) {
												$module = new SLZ_Block_Module( $post, array() );
												$out .= '<li>';
													$out .= '<a href="'. esc_url( $module->permalink ) .'" class="link">';
														$out .= $module->get_title( true, array(), '<span class="text">%1$s</span>' );
														$out .= '<span class="btn-read"><i class="icons fa fa-long-arrow-right"></i>'. esc_html__( 'read story', 'slz' ) .'</span>';
													$out .= '</a>';
												$out .= '</li>';
												
											}// end foreach
										}// end if
									
	
									$out .= '</ul>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				}
				echo ($out);
			}
		}
	}
	?>
</header>