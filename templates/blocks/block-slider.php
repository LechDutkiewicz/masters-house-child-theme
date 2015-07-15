<?php
$visited = shandora_get_meta( $post->ID, 'slider_returning' );

$position = shandora_get_meta( $post->ID, 'slider_position' );

if ( $visited != 3 ) {
	// get parameters for home call to action
	$slogan = bon_get_option( 'home_slogan', 5 );
	$ctas = bon_get_option( 'home_cta', 5 );
} else {
	// get parameters for home call to action for returning users, that opens modal with contact form
	$slogan = bon_get_option( 'home_slogan_returning', 5 );
	$ctas = bon_get_option( 'home_cta_returning', 5 );
}

// get parameters for drawing tool button
$tool = bon_get_option( 'home_cta_tool');

// adjust image size depending on device
if ( current_theme_supports( 'get-the-image' ) ) {
	if ( $_SESSION['layoutType'] === 'mobile' ) {
		$size = 'featured_slider_mobile';
	} else {
		$size = 'featured_slider';
	}
	$src = get_the_image( array( 'size' => $size, 'format' => 'array' ) );
}
?>

<div class="slider-inner-container <?php echo $position; ?>">
	<div class="slider-bg" style="background-image:url('<?php echo esc_url( $src['url'] ); ?>')"></div>
	<div class="mask <?php echo $visited; ?>"></div>

	<div class="flex-caption home-cta-container top">
		<?php if ( $slogan ) { ?>
			<h1 class="primary-title"><span><?php echo $slogan; ?></span></h1>
		<?php } ?>

		<?php if ( $ctas ) { ?>
		<div class="table border-spacing">
			<div class="home-ctas-container table-row">
				<?php shandora_home_cta( $ctas, $tool, $visited ); ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>