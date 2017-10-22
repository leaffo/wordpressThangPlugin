<div class="tab-horizontal">
	<?php
		$tab_align = 'text-l';
		if ($data['tab_align'] == 'text-c') {
			$tab_align = 'text-c'; 
		} else if ($data['tab_align'] == 'text-r') {
			$tab_align = 'text-r';
		} else {
			$tab_align = 'text-l';
		}
	?>
	<div class="tab-list-wrapper <?php echo esc_attr($tab_align) ?>">
		<?php
			echo ( $data['tab'] );
		?>
	</div>
	<div class="tab-content tab-content-carousel">
		<?php echo ( $data['content'] ); ?>
	</div>
</div>