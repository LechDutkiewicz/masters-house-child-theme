<?php

$imgs = array(
	1 => array(
		'id' => pippin_get_image_id( bon_get_option( 'quality_section_image', 'yes' ) )
		)
	);

	?>

	<?php if ( !empty( $imgs ) ) { ?>

	<section class="padding-large top bottom">

		<span class="hover-mask">
			<?php echo wp_get_attachment_image( $imgs['1']['id'], 'full', '', array('class' => '') ); ?>
			<span class="overlay"></span>		
			<a href="#quality-modal" role="button" data-toggle="modal" class="flat button main radius cta button-absolute bottom right hide-for-small" <?php the_ga_event( "Banners", "Click", "Quality Banner" ); ?>><?php _e( 'Read more', 'bon' ); ?></a>
			</span>

		<?php bon_get_template_part( 'block', 'block-modal-quality' ); ?>

	</section>

	<?php } ?>