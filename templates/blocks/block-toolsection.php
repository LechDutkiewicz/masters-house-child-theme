<?php
if ( $_SESSION['layoutType'] === 'tablet' || $_SESSION['layoutType'] === 'classic' ) {
	$mobile = false;
} else if ( $_SESSION['layoutType'] === 'mobile' ) {
	$mobile = true;
}

$imgs = array(
	1 => array(
		'id' => pippin_get_image_id( bon_get_option( 'customize_section_img_1', 'yes' ) )
		),
	2 => array(
		'id' => pippin_get_image_id( bon_get_option( 'customize_section_img_2', 'yes' ) )
		),
	3 => array(
		'id' => pippin_get_image_id( bon_get_option( 'customize_section_img_3', 'yes' ) )
		),
	);

if ( !empty( $imgs ) ) :
	?>

<section class="customize">

	<header>
		<h3><?php echo bon_get_option( 'customize_section_title', 'yes' ); ?></h3>
	</header>

	<span class="separator"></span>

	<div class="row entry-content">

		<?php if ( $mobile ) { ?>

		<div class="column small-12 margin-medium bottom">
			<?php echo wp_get_attachment_image( $imgs['1']['id'], 'listing_small', '', array('class' => 'rounded') ); ?>
		</div>

		<?php } ?>

		<div class="column small-<?php echo $mobile ? '12' : '8'; ?>">
			<h5 class="text main"><?php echo bon_get_option( 'customize_section_header_1', 'yes' ); ?></h5>
			<p><?php echo bon_get_option( 'customize_section_content_1', 'yes' ); ?></p>
			<a class="button flat main radius" data-toggle="collapse" href="#customizeCollapse" aria-expanded="false" aria-controls="customizeCollapse"><?php _e('Show more', 'bon'); ?></a>
		</div>

		<?php if ( !$mobile ) { ?>

		<div class="column small-4">
			<?php echo wp_get_attachment_image( $imgs['1']['id'], 'listing_small', '', array('class' => 'rounded') ); ?>
		</div>

		<?php } ?>

	</div>

	<div class="collapse panel-collapse" id="customizeCollapse">

		<div class="well">

			<span class="separator"></span>

			<div class="row entry-content">

				<?php if ( !$mobile ) { ?>

				<div class="column small-4">
					<?php echo wp_get_attachment_image( $imgs['2']['id'], 'listing_small', '', array('class' => 'rounded') ); ?>
				</div>

				<?php } ?>

				<?php if ( $mobile ) { ?>

				<div class="column small-12 margin-medium bottom">
					<?php echo wp_get_attachment_image( $imgs['2']['id'], 'listing_small', '', array('class' => 'rounded') ); ?>
				</div>

				<?php } ?>

				<div class="column small-<?php echo $mobile ? '12' : '8'; ?>">
					<h5 class="text main"><?php echo bon_get_option( 'customize_section_header_2', 'yes' ); ?></h5>
					<p><?php echo bon_get_option( 'customize_section_content_2', 'yes' ); ?></p>
				</div>
			</div>

			<span class="separator"></span>

			<div class="row entry-content">

				<?php if ( $mobile ) { ?>

				<div class="column small-12 margin-medium bottom">
					<?php echo wp_get_attachment_image( $imgs['3']['id'], 'listing_small', '', array('class' => 'rounded') ); ?>
				</div>

				<?php } ?>

				<div class="column small-<?php echo $mobile ? '12' : '8'; ?>">
					<h5 class="text main"><?php echo bon_get_option( 'customize_section_header_3', 'yes' ); ?></h5>
					<p><?php echo bon_get_option( 'customize_section_content_3', 'yes' ); ?></p>
					<a href="#customize-modal" role="button" data-toggle="modal" class="flat button <?php echo $button_color = bon_get_option( 'cta_button_color', 'emerald' ); ?> radius cta" title="Contact us"><?php _e( 'Contact us', 'bon' ); ?></a>
				</div>

				<?php if ( !$mobile ) { ?>

				<div class="column small-4">
					<?php echo wp_get_attachment_image( $imgs['3']['id'], 'listing_small', '', array('class' => 'rounded') ); ?>
				</div>

				<?php } ?>

			</div>

		</div>

	</div>

	<?php bon_get_template_part( 'block', 'block-modal-customize' ); ?>

</section>

<?php
endif;