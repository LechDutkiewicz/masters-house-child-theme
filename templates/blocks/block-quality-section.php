<?php

$imgs = array(
	1 => array(
		'id' => pippin_get_image_id( bon_get_option( 'quality_section_image', 'yes' ) )
		)
	);

	?>

	<?php if ( !empty( $imgs ) ) { ?>

	<section class="padding-large top bottom">

		<a href="#quality-modal" role="button" data-toggle="modal" class="hover-mask" title="">
			<?php echo wp_get_attachment_image( $imgs['1']['id'], 'full', '', array('class' => '') ); ?>
			<div class="overlay"></div>
		</a>

		<?php bon_get_template_part( 'block', 'block-modal-quality' ); ?>

	</section>

	<?php } ?>