<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if ( ! function_exists( 'slz_get_footer_logo' ) ) :
	/**
	 * Display site logo
	 *
	 * @param string $class
	 */
	function slz_get_footer_logo( $class ) {

		$logo_key = apply_filters('slz_theme_logo_setting_key', 'logo');

		$logo_settings = slz_get_db_settings_option( $logo_key );

		$logo_alt = slz_get_db_settings_option( apply_filters('slz_theme_logo_alt_setting_key', 'logo-alt'), '' );

		$logo_title = slz_get_db_settings_option( apply_filters('slz_theme_logo_title_setting_key', 'logo-title'), '' );

		$url = slz_akg('url', $logo_settings, '' );

		$logo_html = '';

		if ( ! empty( $url ) ) {

			$logo_html = '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo">
							<img src="' . esc_url($url) . '" alt="' . esc_attr( $logo_alt ) . '" title="' . esc_attr( $logo_title ) . '" class="slz-logo img-responsive" />
						</a>';
		}

		return '<div class="' . esc_attr($class) . '">' . $logo_html . '</div>';
	}
endif;

if ( ! function_exists( 'slz_theme_bottom_menu' ) ) :
	/**
	 * Display the nav menu
	 */
	function slz_theme_bottom_menu() {

		$location_name = apply_filters('slz_theme_bottom_menu_key', 'bottom-nav');

		$menu_args = array(
			'depth'           => 1,
			'container'       => 'ul',
			'menu_class'      => 'navbar-footer',
			'theme_location'  => $location_name,
		);

		if ( has_nav_menu ( $location_name ) )
			wp_nav_menu( $menu_args );

	}
endif;

###################################################################################################################
# Get Footer Other Content
###################################################################################################################
if(! function_exists( 'slz_get_footer_other_content' ) ) :
    function slz_get_footer_other_content() {
        // Deny if direct access to file
        if ( ! defined( 'SLZ' ) ) { return; }
        // Get Theme Options Value from DB
        $current_style = slz_get_db_settings_option( 'slz-footer-style-group/slz-footer-style', '' );
        $options       = slz_get_db_settings_option( 'slz-footer-style-group/'.$current_style.'/footer-main', array() );
        // Get option to check Show or Hide Main Footer
        $enable_footer_main = slz_akg('footer-main-enable', $options, '');
        // Get option to check Show or Hide Other Content
        $show_other_content = slz_akg('enable/show-other-content', $options, '');
        // Get option value of other content
        $other_content = slz_akg('enable/other-content', $options, '');
        // Check Main Footer & Other Content
        if( $enable_footer_main == 'enable' && $show_other_content == 'show' ) {
            // Item Format to Render
            $wrapper_div = '<div class="footer-other-content">%1$s</div>';
            $out = apply_filters( 'the_content', $other_content );
            if( !empty( $other_content ) ) {
                printf( $wrapper_div, wp_kses_post( $out ) );
            }
        }
    }
endif;

###################################################################################################################
# Get Footer Other Content Top
###################################################################################################################
if ( ! function_exists( 'slz_get_footer_top_other_content' ) ) :
	function slz_get_footer_top_other_content( $optionFooter = [] ) {
		// Deny if direct access to file
		if ( ! defined( 'SLZ' ) ) {
			return;
		}
		if ( empty( $optionFooter ) ) {
			$current_style = slz_get_db_settings_option( 'slz-footer-style-group/slz-footer-style', '' );
			$optionFooter  = slz_get_db_settings_option( 'slz-footer-style-group/' . $current_style . '/footer-top', array() );
		}
		// Get Theme Options Value from DB
		// Get option to check Show or Hide Main Footer
		$enable_footer_top = slz_akg( 'status', $optionFooter, '' );
		$enable_footer_top = apply_filters( 'slz_enable_footer_top', $enable_footer_top );
		// Get option to check Show or Hide Other Content
		$show_other_content = slz_akg( 'enable/show-other-content', $optionFooter, '' );
		$show_other_content = apply_filters( 'slz_footer_top_show_other_content', $show_other_content );
		// Get option value of other content
		$other_content = slz_akg( 'enable/other-content', $optionFooter, '' );
		$other_content = apply_filters( 'slz_footer_top_other_content', $other_content );
		// Check Main Footer & Other Content
		if ( $enable_footer_top == 'enable' && $show_other_content == 'show' ) {
			// Item Format to Render
			$wrapper_div = '<div class="footer-top-other-content">%1$s</div>';

			//add filter process data
			do_action( 'slz_the_theme_process_vc', $other_content );
			$out = apply_filters( 'the_content', $other_content );

			if ( ! empty( $other_content ) ) {
				printf( $wrapper_div, $out );
			}
		}
	}
endif;
###################################################################################################################

if(! function_exists( 'slz_get_footer_customize_icon' ) ) :
    function slz_get_footer_customize_icon($prefix='') {
        return array(
            'show-customize-icon'.$prefix=>array(
                'type'  => 'multi-picker',
                'label' => false,
                'picker' => array(
                    'btn-enable' => array(
                        'label'        => esc_html__( 'Show Customize Icon', 'slz' ),
                        'desc'         => esc_html__( 'Show Customize Icon in this area', 'slz' ),
                        'type'         => 'switch',
                        'right-choice' => array(
                            'value' => 'show',
                            'label' => esc_html__( 'Show', 'slz' )
                        ),
                        'left-choice'  => array(
                            'value' => 'hide',
                            'label' => esc_html__( 'Hide', 'slz' )
                        ),
                        'value'        => 'hide',
                        'show_borders' => false,
                    ),

                ),
                'choices' => array(
                    'show' => array(
                        'icon-display'  => array(
                            'type'  => 'select',
                            'label' => esc_html__('Customize Icon', 'slz'),
                            'desc'  => esc_html__('Select option to choose how to display the customize icon.', 'slz'),
                            'choices' => array(
                                'icon'		=> esc_html__('Show icon only', 'slz'),
                                'text'		=> esc_html__('Show text only', 'slz'),
                                'both'		=> esc_html__('Show text and icon', 'slz'),
                            ),
                            'value'	=> ''
                        ),
                        'customize-icon' => array(
                            'type'		  => 'addable-popup',
                            'label'		 => esc_html__( 'Customize Icon', 'slz' ),
                            'desc'		  => esc_html__( 'Add your customizable icon', 'slz' ),
                            'template'	  => '{{=icon_name}}',
                            'popup-options' => array(
                                'icon_name' => array(
                                    'label' => esc_html__( 'Name', 'slz' ),
                                    'desc'  => esc_html__( 'Enter a name (it will show in front end)', 'slz' ),
                                    'type'  => 'text',
                                ),
                                'icon_type' => array(
                                    'type'	=> 'multi-picker',
                                    'label'   => false,
                                    'desc'	=> false,
                                    'picker'  => array(
                                        'icon-type' => array(
                                            'label'   => esc_html__( 'Icon', 'slz' ),
                                            'desc'	=> esc_html__( 'Select customize icon type', 'slz' ),
                                            'attr'	=> array( 'class' => 'slz-checkbox-float-left' ),
                                            'type'	=> 'radio',
                                            'value'   => 'icon',
                                            'choices' => array(
                                                'icon' => esc_html__( 'Font Awesome', 'slz' ),
                                                'upload-icon' => esc_html__( 'Custom Upload', 'slz' ),
                                            ),
                                        ),
                                    ),
                                    'choices' => array(
                                        'icon' => array(
                                            'icon_class' => array(
                                                'type'  => 'icon',
                                                'value' => 'fa fa-adn',
                                                'label' => '',
                                            ),
                                        ),
                                        'upload-icon' => array(
                                            'upload-icon' => array(
                                                'label' => '',
                                                'type'  => 'upload',
                                            )
                                        ),
                                    )
                                ),
                                'icon-link' => array(
                                    'label' => esc_html__( 'Link', 'slz' ),
                                    'desc'  => esc_html__( 'Enter your customize icon URL link', 'slz' ),
                                    'type'  => 'text',
                                )
                            ),
                        ),

                    )

                ),
            ),
        );
    }
endif;

if(! function_exists( 'slz_get_footer_render_customize_icon' ) ) :
function slz_get_footer_render_customize_icon( $class, $settings=array() ) {
    $icons = slz_akg('customize-icon', $settings, '');
    $icon_display = slz_akg('icon-display', $settings, '');
    if ( ! empty( $icons ) ) {
        $icons_html = '';
        // parse all icons
        foreach ( $icons as $icon ) {
            $icon_data = '';

            switch ( $icon_display ) {
                case 'icon':
                    if ( $icon['icon_type']['icon-type'] == 'icon' ) {
                        // get icon class
                        if ( ! empty( $icon['icon_type']['icon']['icon_class'] ) ) {
                            $icon_data .= '<i class="' . $icon['icon_type']['icon']['icon_class'] . '"></i>';
                        }
                    } else {
                        // get uploaded icon
                        if ( ! empty( $icon['icon_type']['upload-icon']['upload-icon'] ) ) {
                            $icon_data .= '<img src="' . $icon['icon_type']['upload-icon']['upload-icon']['url'] . '" alt="" />';
                        }
                    }
                    break;
                case 'text':

                    $icon_data .= ( !empty ( $icon['icon_name'] ) ? $icon['icon_name'] : '' );
                    break;

                case 'both':

                    if ( $icon['icon_type']['icon-type'] == 'icon' ) {
                        // get icon class
                        if ( ! empty( $icon['icon_type']['icon']['icon_class'] ) ) {
                            $icon_data .= '<i class="' . $icon['icon_type']['icon']['icon_class'] . '"></i>';
                        }
                    } else {
                        // get uploaded icon
                        if ( ! empty( $icon['icon_type']['upload-icon']['upload-icon'] ) ) {
                            $icon_data .= '<img src="' . $icon['icon_type']['upload-icon']['upload-icon']['url'] . '" alt="" />';
                        }
                    }

                    if ( slz_akg('both/text-position', $settings, '') == 'left' )

                        $icon_data = ( !empty ( $icon['icon_name'] ) ? $icon['icon_name'] : '' ) . ' ' .$icon_data;

                    else

                        $icon_data = $icon_data . ' ' .( !empty ( $icon['icon_name'] ) ? $icon['icon_name'] : '' );

                    break;
                default:
                    break;
            }

            // get icon link
            $link = esc_url($icon['icon-link']);
            if( !empty($link)) {
                $icons_html .= '<a class="text" target="_blank" href="' . $link . '">' . $icon_data . '</a>';
            } else {
                $icons_html .= '<span class="text" >' . $icon_data . '</span>';
            }
        }

        // return icons html
        return '<div class="customize-icon ' . esc_attr($class) . '">' . $icons_html . '</div>';
    }
}
endif;