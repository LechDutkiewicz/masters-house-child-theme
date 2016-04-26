<?php
$visited = shandora_get_meta( $post->ID, 'slider_returning' );

$position = shandora_get_meta( $post->ID, 'slider_position' );

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

	<div class="flex-caption home-cta-container top mobile-text-center">

		<hgroup class="primary-title text-white">

			<?php if ( $visited !== "3" ) { ?>
			<h1>		
				<span class="bold"><?php _e( "Your house", "bon" ); ?></span>
			</h1>
			<h2 class="like-h4 uppercase">
				<span><?php _e( "of rest and relaxation", "bon" ); ?></span>
			</h2>
			<?php } else { ?>
			<h2 class="like-h4 uppercase">
				<span><?php _e( "Do you find it hard", "bon" ); ?></span>
			</h2>
			<h1>	
				<span class="bold"><?php _e( "which house to choose?", "bon" ); ?></span>
			</h1>
			<?php } ?>

		</hgroup>

		<div class="home-ctas-container">

			<?php if ( $visited != 3 ) { ?>

			<a href="<?php echo get_the_permalink( bon_get_option( 'catalog_page' ) ); ?>" class="button flat large radius main" <?php the_ga_event( 'CTA', 'Click on Home Page', "Browse all Cottages" ); ?>>
				<span><?php _e( "Choose a house for you", "bon" ); ?></span>
			</a>
			<a href="<?php echo get_the_permalink( bon_get_option( 'quality_page' ) ); ?>" class="button flat large radius clouds" <?php the_ga_event( 'CTA', 'Click on Home Page', "Browse all Cottages" ); ?>>
				<span><?php _e( "Learn more about us", "bon" ); ?></span>
			</a>

			<?php } else { ?>

			<a href="#" class="button flat large radius main" data-reveal-id="visit-modal" <?php the_ga_event( 'CTA', 'Click on Home Page', "Browse all Cottages" ); ?>>
				<span><?php _e( "Order a free consultation", "bon" ); ?></span>
			</a>

			<?php } ?>

		</div>
	</div>
</div>