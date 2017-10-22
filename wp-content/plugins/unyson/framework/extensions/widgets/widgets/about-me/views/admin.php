<?php

$widget_color_picker_id = SLZ_Com::make_id();

$social_list = SLZ_Params::get('social-icons');
extract( $instance );

$model = new SLZ_Image();

$image_id = $image_json = '';
if(!empty($image)){
	$image_json = $image;
	$image_arr = (array) json_decode($image);
	if( isset($image_arr['ID'])) {
		$image_id = $image_arr['ID'];
	}
}
if( empty($url)) {
	$url = '';
}
?>
<p>
	<label for="<?php echo  esc_attr( $object->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'slz');?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $object->get_field_id('title') ); ?>" name="<?php echo esc_attr( $object->get_field_name('title') ); ?>" value="<?php echo esc_attr( $title ); ?>" />
</p>
<div>
	<label for="<?php echo esc_attr( $object->get_field_id('block_title_color') ); ?>"><?php esc_html_e( 'Title Color:', 'slz' ); ?></label>
	<input data-slz-w-color="<?php echo esc_attr( $widget_color_picker_id ); ?>" class="widefat slz-color-picker-field" id="<?php echo esc_attr( $object->get_field_id('block_title_color') ); ?>"
		   name="<?php echo esc_attr( $object->get_field_name('block_title_color') ); ?>" type="text"
		   value="<?php echo esc_attr( $block_title_color ); ?>" />
	<br><div id="<?php echo esc_attr( $widget_color_picker_id ); ?>" class="slz-color-picker-widget" rel="<?php echo esc_attr( $object->get_field_id('block_title_color') ); ?>"></div>
	<br><div class="slz-widget-description"><?php echo esc_html__('Optional - Choose a custom title text color for this block', 'slz'); ?></div>
</div>
<p>
	<label for="<?php echo  esc_attr( $object->get_field_id('name') ); ?>"><?php esc_html_e('Name', 'slz');?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $object->get_field_id('name') ); ?>" name="<?php echo esc_attr( $object->get_field_name('name') ); ?>" value="<?php echo esc_attr( $name ); ?>" />
</p>
<p>
	<label for="<?php echo esc_attr($object->get_field_id('image') ); ?>"><?php esc_html_e('Avatar:', 'slz');?>
	</label>
	<?php echo ( $model->upload_single_image(esc_attr($object->get_field_name('image') ),$image_id,array(
		'class'=>'wiget-upload-image',
		'image_json' => $image_json,
		'data-rel' => esc_attr($object->get_field_id('image')),
		'id'=> esc_attr($object->get_field_id('image').'_id' ) ) ))?>
</p>
<p>
	<label for="<?php echo  esc_attr( $object->get_field_id('url') ); ?>"><?php esc_html_e('Web Site', 'slz');?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $object->get_field_id('url') ); ?>" name="<?php echo esc_attr( $object->get_field_name('url') ); ?>" value="<?php echo esc_attr( $url ); ?>" />
</p>
<p>
	<label for="<?php echo  esc_attr( $object->get_field_id('detail') ); ?>"><?php esc_html_e('Detail', 'slz');?></label>
	<textarea class="widefat" id="<?php echo esc_attr( $object->get_field_id('detail') ); ?>" name="<?php echo esc_attr( $object->get_field_name('detail') ); ?>"><?php echo esc_html( $detail ); ?></textarea>
</p>

<?php foreach ($social_list as $social_key => $icon) {
	$social_value = '';
	$social_key = str_replace('-', '_', $social_key);
	if( isset($instance[$social_key]) && !empty($instance[$social_key]) ) {
		$social_value = $instance[$social_key];
	}
	?>
	<p>
		<label for="<?php echo esc_attr( $object->get_field_id($social_key) ); ?>"><?php esc_html_e('Social Profile : ', 'slz');?><?php echo esc_html( ucfirst( $social_key ) ); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr( $object->get_field_id($social_key) ); ?>" name="<?php echo esc_attr( $object->get_field_name($social_key) ); ?>" value="<?php echo esc_attr( $social_value ); ?>" />
	</p>

<?php } ?>

<p>
	<label for="<?php echo  esc_attr( $object->get_field_id('extra_class') ); ?>"><?php esc_html_e('Extra Class', 'slz');?></label>
	<input class="widefat" type="text" id="<?php echo esc_attr( $object->get_field_id('extra_class') ); ?>" name="<?php echo esc_attr( $object->get_field_name('extra_class') ); ?>" value="<?php echo esc_attr( $extra_class ); ?>" />
</p>

<script>
	slz_color_picker();
</script>