<?php
$header_class = $subheader_icon = $subheader_class = $subheader_mask = $header_sticky = '';
$transparent = false;
$search_icon = 'fa fa-search';
if ( !empty ( $search_style['icon-class'] ) ) {
	$search_icon = $search_style['icon-class'];
}

$logo_class = 'float-l';
$main_menu_class = 'float-r';

if ( slz_akg('logo-align', $options, 'left') == 'right'){
	$main_menu_class = 'float-l';
	$logo_class = 'float-r';
}

list($header_class, $transparent) = slz_get_header_transparent(slz_get_db_settings_option('slz-header-style-group/slz-header-style',''));

//sticky
if ( slz_akg('enable-sticky-header', $options, '') == 'yes' ){
	$header_sticky = 'slz-header-sticky';
}
//fix header
$fixed_header = slz_get_db_post_option( get_the_ID() ,'page-fix-header');
if( $fixed_header == 'yes') {
	$header_sticky .= ' slz-header-onepage';
}
$html_topbar_register_login = '';
if (function_exists('slz_theme_render_register_login_client')) {
	$show_rl_client = slz_get_db_settings_option('account-status', '');
	if ($show_rl_client == 'show') {
		$html_topbar_register_login = slz_theme_render_register_login_client();
	}
}
$header_class .= slz_akg('header-styling/header-style', $options, '');
SLZ_Live_Setting::get_header_animation($header_sticky);
$other_group = slz_akg('other-group', $options, array() );
?>
<header>
	<div class="slz-header-wrapper header-07 slz-header-sidebar <?php echo esc_attr($header_class);?>">

		<!-- Header Main -->
		<div class="slz-header-main <?php echo esc_attr($header_sticky) .' '.esc_attr($subheader_class);?>">
			
			<!-- Hamburger Menu Mobile -->
			<div class="slz-hamburger-menu">
				<div class="bar"></div>
			</div>
			
			<!-- <div class="slz-header-wrapper"> -->

				<!-- Logo -->
				<?php echo slz_get_logo('slz-logo-wrapper', $transparent ); ?>

				<!-- Search & Account -->
				<div class="slz-top-content">
					<?php if ( slz_akg('enable-search', $options, 'no' ) == 'yes') : ?>
						<div class="slz-button-search-sidebar"><i class="icons <?php echo esc_attr($search_icon); ?>"></i></div>
						<div class="search-sidebar-wrapper">
							<div class="search-sidebar">
								<?php get_search_form(true); ?>
							</div>
						</div>
					<?php endif; ?>
					<?php echo SLZ_Com::get_woo_account(false);?>
					<?php 
					// wpml language
					if(has_action('wpml_add_language_selector')) {
						$show_laguage_switcher = slz_get_db_settings_option('enable-wpml', '');
						if($show_laguage_switcher == 'yes'){
							echo '<div class="wpml-language item">';
							do_action('wpml_add_language_selector');
							echo '</div>';
						}
					}
					?>
				</div>
				<!-- Main Menu -->
				<div class="slz-main-menu">
					<?php slz_theme_nav_menu( 'main-nav', $options ); ?>
				</div>

				<!-- Social & Other Text -->
				<div class="slz-bottom-content">
					<?php echo slz_display_menu_bottom_content('slz-sidebar-social', $other_group, array(
							'other'=>slz_akg('other-content', $options, array())
						) ); ?>
				</div>

			<!-- </div> -->
			
		</div>
	</div>
</header>