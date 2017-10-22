<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/18/2017
 * Time: 1:34 PM
 */


?>

<h2>option 1</h2>

<div id="myCarousel"  class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<?php
	$active = 'active';

	?>

	<ol class="carousel-indicators">
		<?php foreach ( $array_Image_slide as $key => $image ) {
			?>
			<li data-target="#myCarousel" data-slide-to="<?php echo $key; ?>"
			    class="<?php
			    if ( $key == 0 ) {
				    echo esc_attr( $active );
			    } ?>"></li>
			<?php
		} ?>        </ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">

		<?php foreach ( $array_Image_slide as $key => $image ) { ?>
			<div class="item <?php if ( $key == 1 ) {
				echo esc_attr( $active );
			} ?>">
				<?php echo wp_get_attachment_image( $image->image );
				?>
			</div>
		<?php } ?>        </div>
	<?php
	?>
	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>



<!--

<div >
	<h1>option 1</h1>
	<hr>
</div>
<div class="thangclass1" style="float:left;width: 50%;background-color:#A27D35">


	<?php
/*	if ( ! empty( $array_Image_slide ) ) {
		foreach ( $array_Image_slide as $image ) {
			*/ ?>
			<?php
/*			if ( ! empty( $image->title ) ) {
				printf( '<div class="">%1$s</div>', esc_html__( $image->title ) );
			}
			echo wp_get_attachment_image( $image->image );

			if ( ! empty( $image->content ) ) {
				printf( '<div class="">%1$s</div>', esc_html__( $image->content ) );
			}
		}
	}
	*/ ?>

</div>
<div class="thangclass" style="float:left;width:50%;height:auto;background-color:#404040">
	<?php
/*	if ( ! empty( $array_Image_slide ) ) {
		foreach ( $array_Image_slide as $image ) {
			*/ ?>
			<?php
/*			if ( ! empty( $image->title ) ) {
				printf( '<div class="">%1$s</div>', esc_html__( $image->title ) );
			}
			echo wp_get_attachment_image( $image->image );

			if ( ! empty( $image->content ) ) {
				printf( '<div class="">%1$s</div>', esc_html__( $image->content ) );
			}
		}
	}
	*/ ?>
</div>
-->