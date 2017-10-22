<div class="media">
	<div class="media-left">
		<a href="<?php echo esc_url( $module->permalink ); ?>" class="wrapper-image">
			<?php echo ( $module->get_featured_image( 'small', array( 'thumb_class' => 'media-object' ) ) ); ?>
		</a>
	</div>
	<div class="media-right">
		<?php echo ( $module->get_title( true, array(), '<a href="%2$s" class="media-heading">%1$s</a>' ) ); ?>
		<div class="meta">
			<?php
			$post_info = slz_get_db_settings_option('post-info', array());
			$result = array();
			if( $post_info ) {
				$post_info = array_unique($post_info);
				foreach ($post_info as $info) {
					switch ($info) {
						case 'date':
							if ( $date = $module->get_date() )
								$result[] = '<div class="meta-info time">'. $date . '</div>';
								break;
						case 'author':
							if ( $author = $module->get_author() )
								$result[] = '<div class="meta-info">' . $author . '</div>';
								break;
						case 'comment':
							$format = '<a href="%1$s" class="link">%2$s %3$s</a>';
							if ( $comment = $module->get_comments($format) )
								$result[] = '<div class="meta-info comment"><i class="icon-meta fa fa-comments"></i>' . $comment . '</div>';
							break;
						case 'view':
							if ( $view = $module->get_views() )
								$result[] = '<div class="meta-info view"><i class="icon-meta fa fa-eye"></i>' . $view . '</div>';
								break;
						default:
							break;
					}
						
				}
			}
			echo implode( '', $result );
			?>
		</div>
	</div>
</div>