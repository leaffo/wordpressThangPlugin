<ul class="block-info">
	<?php
		$exclude = slz()->theme->get_config('post_info_exclude', array());
		echo ( $module->get_meta_data('', $exclude ) );
	?>
</ul>