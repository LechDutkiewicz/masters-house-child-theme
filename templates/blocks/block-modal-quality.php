<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<?php

$qualities = get_qualities();

?>

<div id="quality-modal" class="reveal-modal large" data-css-top="15">
	<div class="modal-header bg-<?php echo bon_get_option( 'search_button_color', 'red' ); ?>">
		<h4 class="modal-title text-white" id="contact-modal-label"><?php echo bon_get_option( 'quality_section_title' ); ?></h4>
	</div>
	<div class="modal-body">

		<div class="row">

			<div class="column large-10 large-centered">

				<div class="quality-img-container">

					<img src="<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/qualities/wooden-house.png" class="auto" />

					<?php if ( !empty( $qualities ) ) { ?>

					<?php foreach ( $qualities as $index => $quality_item ) { ?>

					<div class="quality-icon" data-target="<?php echo $index; ?>" data-top="<?php echo $quality_item['top']; ?>"data-left="<?php echo $quality_item['left']; ?>"  data-tablet-top="<?php echo $quality_item['tablet-top']; ?>" data-tablet-left="<?php echo $quality_item['tablet-left']; ?>" <?php the_ga_event( "Quality Widget", "Click Icon", bon_get_option( sanitize_title( $quality_item['name'] ) . '_name' ), get_the_permalink() ); ?>>

						<?php if ( $quality_item['arrow'] ) { ?>
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

			<div class="desc-container column large-12">

				<div class="clearfix active<?php echo bon_get_option( 'main_img' ) ? '' : ' no-img'; ?>">

					<div class="description-img"<?php echo bon_get_option( 'main_img' ) ? 'style="background-image:url\'(' . bon_get_option( 'main_img' ) . '\')"' : ''; ?>>
					</div>

					<div class="description-headers">
						<span class="like-h4"><?php echo bon_get_option( 'main_name' ); ?></span>
						<p><?php echo bon_get_option( 'main_desc' ); ?></p>
					</div>
				</div>

				<?php if ( !empty( $qualities ) ) { ?>

				<?php foreach ( $qualities as $index => $quality_item ) { ?>

				<div class="clearfix" data-target="<?php echo $index; ?>">
					<div class="description-img" style="background-image:url('<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/qualities/<?php echo sanitize_title( $quality_item['name'] ); ?>.jpg');">
					</div>
					<div class="description-headers">
						<span class="like-h4"><?php echo bon_get_option( sanitize_title( $quality_item['name'] ) . '_name' ); ?></span>
						<p><?php echo bon_get_option( sanitize_title( $quality_item['name'] ) . '_desc' ); ?></p>
					</div>
				</div>

				<?php } ?>

				<?php } ?>

			</div>

		</div>

	</div>
	<a class="close-reveal-modal" title="<?php _e( 'Close', 'bon'); ?>">&#215;</a>
</div>