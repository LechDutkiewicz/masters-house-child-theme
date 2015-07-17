<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<?php

$imgs = array(
	1 => array(
		'id' => pippin_get_image_id( bon_get_option( 'quality_section_house_image', 'yes' ) )
		)
	);

$qualities = get_qualities();

?>

<div id="quality-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="quality-modal-label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg <?php echo bon_get_option( 'search_button_color', 'red' ); ?>">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="contact-modal-label"><?php echo bon_get_option( 'quality_section_title' ); ?></h4>
			</div>
			<div class="modal-body">

				<?php if ( $_SESSION['layoutType'] !== 'mobile' ) { ?>

				<div class="quality-img-container">

					<?php if ( !empty( $imgs ) ) { ?>

					<?php echo wp_get_attachment_image( $imgs['1']['id'], 'full', '', array('class' => '') ); ?>

					<?php } ?>

					<?php if ( !empty( $qualities ) ) { ?>

					<?php foreach ( $qualities as $index => $quality_item ) { ?>

					<div class="quality-icon animate bounceIn" data-target="<?php echo $index; ?>" data-top="<?php echo $quality_item['top']; ?>"data-left="<?php echo $quality_item['left']; ?>"  data-tablet-top="<?php echo $quality_item['tablet-top']; ?>" data-tablet-left="<?php echo $quality_item['tablet-left']; ?>">

						<?php if ( $quality_item['arrow'] ) { ?>
						<div class="click-arrow">
							<span><?php _e( 'Click here', 'bon'); ?></span>
						</div>
						<?php } ?>

						<div class="icon-bg" style="background-image:url('<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/qualities/<?php echo sanitize_title( $quality_item['name'] ); ?>.jpg');"></div>
						<div class="icon-desc-container">
							<div class="icon-desc like-h5"><?php echo bon_get_option( sanitize_title( $quality_item['name'] ) . '_name' ); ?></div>
						</div>
					</div>

					<?php } ?>

					<?php } ?>

				</div>

				<?php } ?>

				<div class="desc-container">

					<?php if ( $_SESSION['layoutType'] !== 'mobile' ) { ?>

					<div class="clearfix margin-medium bottom active<?php echo bon_get_option( 'main_img' ) ? '' : ' no-img'; ?>">
						
						<div class="description-img"<?php echo bon_get_option( 'main_img' ) ? 'style="background-image:url\'(' . bon_get_option( 'main_img' ) . '\')"' : ''; ?>>
						</div>

						<div class="description-headers">
							<span class="like-h4"><?php echo bon_get_option( 'main_name' ); ?></span>
							<p><?php echo bon_get_option( 'main_desc' ); ?></p>
						</div>
					</div>

					<?php } ?>

					<?php if ( !empty( $qualities ) ) { ?>

					<?php foreach ( $qualities as $index => $quality_item ) { ?>

					<div class="clearfix margin-medium bottom" data-target="<?php echo $index; ?>">
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
	</div>
</div>