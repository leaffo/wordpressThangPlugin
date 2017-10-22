<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class SLZ_Ext_Mega_Menu_Admin_Walker extends Walker_Nav_Menu /* Walker_Nav_Menu_Edit: Fatal Error: Class Not Found */
{
	function start_lvl( &$output, $depth = 0, $args = array() ) {}
	function end_lvl( &$output, $depth = 0, $args = array() ) {}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		ob_start();
		$item_id = esc_attr( $item->ID );
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);

		$original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = get_the_title( $original_object->ID );
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);

		$title = $item->title;

		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( __( '%s (Invalid)', 'slz' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( __('%s (Pending)', 'slz'), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

		$submenu_text = '';
		if ( 0 == $depth )
			$submenu_text = 'style="display: none;"';

		?>
		<li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo esc_attr(implode(' ', $classes )); ?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
					<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e( 'sub item', 'slz' ); ?></span></span>
					<span class="item-controls">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
						<span class="item-type show-if-mega-menu-top"><?php echo __('Mega Menu', 'slz') ?></span>
						<span class="item-type show-if-mega-menu-column"><?php echo __('Column', 'slz') ?></span>
						<span class="item-type hide-if-mega-menu-top hide-if-mega-menu-column"><?php echo esc_html($item->type_label) ?></span>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
						<span class="item-order hide-if-js">
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-up-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'slz'); ?>">&#8593;</abbr></a>
							|
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-down-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'slz'); ?>">&#8595;</abbr></a>
						</span>
						<a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'slz'); ?>" href="<?php
							echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
						?>"><?php _e( 'Edit Menu Item', 'slz' ); ?></a>
					</span>
				</dt>
			</dl>

			<div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
				<?php if( 'custom' == $item->type ) : ?>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
					<p class="field-url description description-wide hide-if-mega-menu-column">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
						<label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
							<?php _e( 'URL', 'slz' ); ?><br />
							<input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
						</label>
					</p>
				<?php endif; ?>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
				<p class="description description-thin hide-if-mega-menu-column hide-if-mega-menu-item">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
					<label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
						<?php _e( 'Navigation Label', 'slz' ); ?><br />
						<input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
					</label>
				</p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
				<p class="description description-thin hide-if-mega-menu-column hide-if-mega-menu-item">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
					<label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
						<?php _e( 'Title Attribute', 'slz' ); ?><br />
						<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
					</label>
				</p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
                <p class="description description-thin">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
                    <label for="edit-menu-item-sub-label-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Sub Label', 'slz' ); ?><br />
                        <input type="text" id="edit-menu-item-sub-label-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-sub-label" name="<?php echo _slz_ext_mega_menu_admin_input_name( $item, 'sub_label' ) ?>" value="<?php echo esc_attr( slz_ext_mega_menu_get_meta($item, 'sub_label') ) ?>" />
                    </label>
                </p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
                <p class="description description-thin">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
                    <label for="edit-menu-item-sub-label-type-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Sub Label Type', 'slz' ); ?><br />
                        <select id="edit-menu-item-sub-label-type-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-sub-label-type" name="<?php echo _slz_ext_mega_menu_admin_input_name( $item, 'sub_label_type' ) ?>">
                            <?php
                            $options_sub_label_type = array(
                                'default' => esc_html__( 'Default Label', 'slz' ),
                                'primary' => esc_html__( 'Primary Label', 'slz' ),
                                'success' => esc_html__( 'Success Label', 'slz' ),
                                'info'    => esc_html__( 'Info Label', 'slz' ),
                                'warning' => esc_html__( 'Warning Label', 'slz' ),
                                'danger'  => esc_html__( 'Danger Label', 'slz' ),
                            );
                            $sub_label_type_value = slz_ext_mega_menu_get_meta( $item, 'sub_label_type', 'default' );
                            foreach ( $options_sub_label_type as $value => $text ): ?>
                            <option value="<?php echo esc_attr( $value ) ?>" <?php echo $sub_label_type_value == $value ? esc_attr( 'selected' ) : ''; ?>><?php echo ( $text ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
				<p class="field-link-target description hide-if-mega-menu-column">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
					<label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
						<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
						<?php _e( 'Open link in a new window/tab', 'slz' ); ?>
					</label>
				</p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
				<p class="field-css-classes description description-thin hide-if-mega-menu-column">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
					<label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
						<?php _e( 'CSS Classes (optional)', 'slz' ); ?><br />
						<input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
					</label>
				</p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
				<p class="field-xfn description description-thin hide-if-mega-menu-column">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
					<label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
						<?php _e( 'Link Relationship (XFN)', 'slz' ); ?><br />
						<input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
					</label>
				</p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
<?php # Column ?>
				<p class="description description-wide show-if-mega-menu-column show-if-mega-menu-item">
					<label>
						<span class="hide-if-mega-menu-item"><?php _e('Mega Menu Column Title', 'slz') ?></span>
						<span class="hide-if-mega-menu-column"><?php _e('Item Title', 'slz') ?></span><br />
						<?php // -------------------------- ?>
						<?php // NOTE this is a post title! ?>
						<?php // -------------------------- ?>
						<input type="text" name="menu-item-title[<?php echo esc_attr($item_id) ?>]" value="<?php echo esc_attr($item->title) ?>" class="widefat mega-menu-title" />
					</label>
					<label class="mega-menu-title-off-label">
						<input type="checkbox" name="<?php echo _slz_ext_mega_menu_admin_input_name($item, 'title-off') ?>" <?php checked(slz_ext_mega_menu_get_meta($item, 'title-off')) ?> class="mega-menu-title-off" />
						<?php _e('Hide', 'slz') ?>
					</label>
				</p>
				<p class="description description-wide show-if-mega-menu-column">
					<label>
						<input type="checkbox" name="<?php echo _slz_ext_mega_menu_admin_input_name($item, 'new-row') ?>" <?php checked(slz_ext_mega_menu_get_meta($item, 'new-row')) ?> class="mega-menu-column-new-row" />
						<?php _e('This column should start a new row', 'slz') ?>
					</label>
				</p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
				<p class="field-description description description-wide x-hide-if-mega-menu-column force-show-if-mega-menu-column force-show-if-mega-menu-item">
					<label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
						<?php _e( 'Description (HTML)', 'slz' ); ?><br />
						<?php /* Note that raw description is stored in post_content */ ?>
						<textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->post_content ); // textarea_escaped ?></textarea>
						<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'slz'); ?></span>
					</label>
				</p>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
<?php do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args ); // https://github.com/ThemeFuse/Unyson-MegaMenu-Extension/issues/5 ?>
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
<?php # Icon ?>
				<p class="field-mega-menu-icon description description-wide empty show-if-screen-options-icon">
					<label>
						<?php _e('Icon', 'slz') ?><br />
						<a href="#" class="button" data-action="mega-menu-pick-icon">
							<span class="inline-if-empty"><?php _e('Add Icon', 'slz') ?></span>
							<span class="hide-if-empty"><?php _e('Edit Icon', 'slz') ?></span>
						</a>&nbsp;
						<span data-action="mega-menu-pick-icon" class="mega-menu-icon-frame hide-if-empty" style="position: relative;">
							<i class="mega-menu-icon-i"></i>
							<a href="#" class="mega-menu-icon-remove dashicons slz-x" data-action="mega-menu-remove-icon" title="<?php esc_attr_e('Remove Icon', 'slz') ?>"></a>
						</span>
						<span class="mega-menu-icon-frame inline-if-empty" data-action="mega-menu-pick-icon"><i class="fa fa-lg fa-eye" style="position: relative; top: -1px;"></i></span>
						<input type="hidden" name="<?php echo _slz_ext_mega_menu_admin_input_name($item, 'icon') ?>" value="<?php echo esc_attr(slz_ext_mega_menu_get_meta($item, 'icon')) ?>" data-subject="mega-menu-icon-input" />
					</label>
				</p>
<?php # Use as Mega Menu ?>
				<p class="description description-wide show-if-menu-top">
					<label>
						<input type="checkbox" name="<?php echo _slz_ext_mega_menu_admin_input_name($item, 'enabled') ?>" <?php checked(slz_ext_mega_menu_get_meta($item, 'enabled')) ?> class="mega-menu-enabled" />
						<?php _e('Use as Mega Menu', 'slz') ?>
					</label>
				</p>
				<p class="field-move hide-if-no-js description description-wide hide-if-mega-menu-column">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
					<label>
						<span><?php _e( 'Move', 'slz' ); ?></span>
						<a href="#" class="menus-move-up"><?php _e( 'Up one', 'slz' ); ?></a>
						<a href="#" class="menus-move-down"><?php _e( 'Down one', 'slz' ); ?></a>
						<a href="#" class="menus-move-left"></a>
						<a href="#" class="menus-move-right"></a>
						<a href="#" class="menus-move-top"><?php _e( 'To the top', 'slz' ); ?></a>
					</label>
				</p>

<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
				<div class="menu-item-actions description-wide submitbox">
<?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ?>
					<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original hide-if-mega-menu-column">
							<?php printf( __('Original: %s', 'slz'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
						</p>
					<?php endif; ?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
					echo wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'delete-menu-item',
								'menu-item' => $item_id,
							),
							admin_url( 'nav-menus.php' )
						),
						'delete-menu_item_' . $item_id
					); ?>"><?php _e( 'Remove', 'slz' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
						?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php _e('Cancel', 'slz'); ?></a>
				</div>

				<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
				<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
				<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
				<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
				<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
				<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
				<div class="slz-clear"></div>
			</div><!-- .menu-item-settings-->
			<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}
}

/**
 * @deprecated
 */
class SLZ_Admin_Menu_Walker extends SLZ_Ext_Mega_Menu_Admin_Walker {}
