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

<section class="customize padding-large top bottom hide-for-small">

	<header>
		<h2><?php echo bon_get_option( 'customize_section_title', 'yes' ); ?></h2>
	</header>

	<span class="separator"></span>

	<div class="row">

		<?php if ( $mobile ) { ?>

		<div class="column small-12 margin-medium bottom">
			<?php echo wp_get_attachment_image( $imgs['1']['id'], 'listing_small', '', array('class' => '') ); ?>
		</div>

		<?php } ?>

		<div class="column small-<?php echo $mobile ? '12' : '8'; ?>">
			<h3 class="like-h4"><?php echo bon_get_option( 'customize_section_header_1', 'yes' ); ?></h3>
			<?php echo bon_get_option( 'customize_section_content_1', 'yes' ); ?>
			<?php if ( !empty($imgs['2']['id']) && !empty($imgs['3']['id'] ) ) { ?>

			<a class="button flat main radius" role="button" data-toggle="collapse" href="#customizeCollapse" aria-expanded="false" aria-controls="customizeCollapse" <?php the_ga_event( "Customize", "Open Customization Section" ); ?> data-title-shrinked="<?php _e('Show more', 'bon')?>" data-title-collapsed="<?php _e('Collapse', 'bon'); ?>">
				<span><?php _e('Show more', 'bon'); ?></span><i class="bonicons bi-plus"></i>
			</a>
			
			<?php } else { ?>

			<a href="#" role="button" data-modal-title="<?php _e("Please describe some details", "bon"); ?>" data-reveal-id="contact-modal" class="flat button <?php echo $button_color = bon_get_option( 'cta_button_color', 'emerald' ); ?> radius cta" title="<?php _e( 'Contact us', 'bon'); ?>" <?php the_ga_event( array( "Customize", "Open Contact Form" ), array( 'CTA', 'Click buy', 'Customize' ), array( "Contact", "Open", "Customization Section" ) ); ?>><?php _e( 'Contact us', 'bon' ); ?></a>

			<?php } ?>
		</div>

		<?php if ( !$mobile ) { ?>

		<div class="column small-4">
			<?php echo wp_get_attachment_image( $imgs['1']['id'], 'listing_small', '', array('class' => '') ); ?>
		</div>

		<?php } ?>

	</div>

	<?php if ( !empty($imgs['2']['id']) && !empty($imgs['3']['id'] ) ) { ?>

	<div class="collapse" id="customizeCollapse">

		<div class="well">

			<span class="separator"></span>

			<div class="row entry-content">

				<?php if ( !$mobile ) { ?>

				<div class="column small-4">
					<?php echo wp_get_attachment_image( $imgs['2']['id'], 'listing_small', '', array('class' => '') ); ?>
				</div>

				<?php } ?>

				<?php if ( $mobile ) { ?>

				<div class="column small-12 margin-medium bottom">
					<?php echo wp_get_attachment_image( $imgs['2']['id'], 'listing_small', '', array('class' => '') ); ?>
				</div>

				<?php } ?>

				<div class="column small-<?php echo $mobile ? '12' : '8'; ?>">
					<h3 class="like-h4"><?php echo bon_get_option( 'customize_section_header_2', 'yes' ); ?></h3>
					<?php echo bon_get_option( 'customize_section_content_2', 'yes' ); ?>
					<?php shandora_tool_cta(); ?>				
				</div>
			</div>

			<span class="separator"></span>

			<div class="row entry-content">

				<?php if ( $mobile ) { ?>

				<div class="column small-12 margin-medium bottom">
					<?php echo wp_get_attachment_image( $imgs['3']['id'], 'listing_small', '', array('class' => '') ); ?>
				</div>

				<?php } ?>

				<div class="column small-<?php echo $mobile ? '12' : '8'; ?>">
					<h3 class="like-h4"><?php echo bon_get_option( 'customize_section_header_3', 'yes' ); ?></h3>
					<?php echo bon_get_option( 'customize_section_content_3', 'yes' ); ?>
					<a href="#" role="button" data-modal-title="<?php _e("Please describe some details", "bon"); ?>" data-reveal-id="contact-modal" class="flat button <?php echo $button_color = bon_get_option( 'cta_button_color', 'emerald' ); ?> radius cta" title="<?php _e( 'Contact us', 'bon'); ?>" <?php the_ga_event( array( "Customize", "Open Contact Form" ), array( 'CTA', 'Click buy', 'Customize' ), array( "Contact", "Open", "Customization Section" ) ); ?>><?php _e( 'Contact us', 'bon' ); ?></a>
				</div>

				<?php if ( !$mobile ) { ?>

				<div class="column small-4">
					<?php echo wp_get_attachment_image( $imgs['3']['id'], 'listing_small', '', array('class' => '') ); ?>
				</div>

				<?php } ?>

			</div>

		</div>

	</div>

	<?php } ?>

</section>

<?php
endif;