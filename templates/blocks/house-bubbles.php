<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

$qualities = get_qualities();

?>

<div class="column medium-8">

	<div class="quality-img-container">

		<img src="<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/qualities/wooden-house.png" class="auto" />

		<?php if ( !empty( $qualities ) ) { ?>

		<?php foreach ( $qualities as $index => $quality_item ) { ?>

		<div class="quality-icon" role="tab" aria-tabs="quality-tabs" aria-selected="false" aria-controls="<?php echo sanitize_title( $quality_item['name'] ); ?>" data-target="<?php echo $index; ?>" data-top="<?php echo $quality_item['top']; ?>" data-left="<?php echo $quality_item['left']; ?>"  data-tablet-top="<?php echo $quality_item['tablet-top']; ?>" data-tablet-left="<?php echo $quality_item['tablet-left']; ?>" <?php the_ga_event( "Quality Widget", "Click Icon", bon_get_option( sanitize_title( $quality_item['name'] ) . '_name' ), get_the_permalink() ); ?>>

			<?php if ( array_key_exists( 'arrow', $quality_item ) ) { ?>
			<div class="click-arrow">
				<span><?php _e( 'Click here', 'bon'); ?></span>
			</div>
			<?php } ?>

			<div class="icon-bg circle" style="background-image:url('<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/qualities/<?php echo sanitize_title( $quality_item['name'] ); ?>.jpg');"></div>
		</div>

		<?php } ?>

		<?php } ?>

	</div>

</div>

<div class="column medium-4">

	<?php if ( !empty( $qualities ) ) { ?>

	<div tabs-object="quality-tabs" class="tabs-container">
		<section>
			<div class="tab-contents">
				<div class="tab-content active" role="tabpanel" aria-hidden="false">
					<span class="like-h4"><?php echo bon_get_option( 'main_name' ); ?></span>
					<hr>
					<p><?php echo bon_get_option( 'main_desc' ); ?></p>					
				</div>
				<?php foreach ( $qualities as $index => $quality_item ) { ?>

				<div id="<?php echo sanitize_title( $quality_item['name'] ); ?>" class="tab-content" role="tabpanel" aria-hidden="true">
					<figure>
						<div class="margin-medium bottom bg-cover" style="height:200px;background-image:url('<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/qualities/<?php echo sanitize_title( $quality_item['name'] ); ?>.jpg');">
						</div>
						<figcaption>
							<span class="like-h4"><?php echo bon_get_option( sanitize_title( $quality_item['name'] ) . '_name' ); ?></span>
							<p><?php echo bon_get_option( sanitize_title( $quality_item['name'] ) . '_desc' ); ?></p>
						</figcaption>
					</figure>
				</div>

				<?php } ?>
			</div>
		</section>
	</div>

	<?php } ?>

</div>