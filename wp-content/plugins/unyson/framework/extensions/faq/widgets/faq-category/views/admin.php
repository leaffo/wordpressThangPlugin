<?php
$category_slug = array();
if ( ! empty( $instance['category_slug'] ) ) {
	$category_slug = $instance['category_slug'];
}

$block_title_color = '#';
if ( ! empty( $instance['block_title_color'] ) ) {
	$block_title_color = esc_attr( $instance['block_title_color'] );
}

$title         = esc_attr( $instance['title'] );
$category_list = SLZ_Com::get_tax_options2slug( 'slz-faq-cat', array(), array( 'hide_empty' => false, ) );
$widget_color_picker_id = SLZ_Com::make_id();

?>
<p>
    <label for="<?php echo esc_attr( $object->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'slz' ); ?></label>
    <input class="widefat" type="text" id="<?php echo esc_attr( $object->get_field_id( 'title' ) ); ?>"
           name="<?php echo esc_attr( $object->get_field_name( 'title' ) ); ?>"
           value="<?php echo esc_attr( $title ); ?>"/>
</p>
<div>
    <label for="<?php echo esc_attr( $object->get_field_id( 'block_title_color' ) ); ?>"><?php esc_html_e( 'Title Color:', 'slz' ); ?></label>
    <input data-slz-w-color="<?php echo esc_attr( $widget_color_picker_id ); ?>" class="widefat slz-color-picker-field"
           id="<?php echo esc_attr( $object->get_field_id( 'block_title_color' ) ); ?>"
           name="<?php echo esc_attr( $object->get_field_name( 'block_title_color' ) ); ?>" type="text"
           value="<?php echo esc_attr( $block_title_color ); ?>"/>
    <br>
    <div id="<?php echo esc_attr( $widget_color_picker_id ); ?>" class="slz-color-picker-widget"
         rel="<?php echo esc_attr( $object->get_field_id( 'block_title_color' ) ); ?>"></div>
    <br>
    <div class="slz-widget-description"><?php echo esc_html__( 'Optional - Choose a custom title text color for this block', 'slz' ); ?></div>
</div>
<div>
    <label for="<?php echo esc_attr( $object->get_field_id( 'category_slug' ) ); ?>"><?php esc_html_e( 'FAQ Category:', 'slz' ); ?></label>
    <select class="widefat multi-long-choice" id="<?php echo esc_attr( $object->get_field_id( 'category_slug' ) ); ?>"
            name="<?php echo esc_attr( $object->get_field_name( 'category_slug' ) ); ?>[]" multiple="true">
		<?php foreach ( $category_list as $k => $v ) { ?>
            <option value="<?php echo esc_attr( $v ); ?>"<?php if ( in_array( $v, $category_slug ) ) {
				echo " selected";
			} ?>><?php echo esc_html( $k ); ?></option>
		<?php } ?>
    </select>
    <br><br>
    <div class="slz-widget-description"><?php echo esc_html__( 'Choose FAQ category to show', 'slz' ); ?></div>
</div>
<script>
    slz_color_picker();
</script>