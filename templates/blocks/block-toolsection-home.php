<?php
if ( $_SESSION['layoutType'] === 'tablet' || $_SESSION['layoutType'] === 'classic' ) {
	$mobile = false;
} else if ( $_SESSION['layoutType'] === 'mobile' ) {
	$mobile = true;
}

$imgs = array(
	1 => array(
		'id' => pippin_get_image_id( bon_get_option( 'customize_section_img_4', 'yes' ) )
		),
	);

if ( !empty( $imgs ) && !$mobile ) :
	?>

<section class="customize hide-for-small">

	<header class="section-header">
		<h2 class="home-section-header"><?php echo bon_get_option( 'customize_section_title_home', 'yes' ); ?></h3>
	</header>

	<div class="row entry-content">

		<?php if ( $mobile ) { ?>

		<div class="column small-12 margin-medium bottom">
			<?php echo wp_get_attachment_image( $imgs['1']['id'], 'blog_small', '', array('class' => 'rounded') ); ?>
		</div>

		<?php } ?>

		<div class="column small-<?php echo $mobile ? '12' : '8'; ?>">
			<h3 class="text-<?php echo bon_get_option( 'tool_button_color', 'peterRiver' ); ?>"><?php echo bon_get_option( 'customize_section_header_home', 'yes' ); ?></h3>
			<p><?php echo bon_get_option( 'customize_section_content_home', 'yes' ); ?></p>
			<?php shandora_tool_cta(); ?>	
		</div>

		<?php if ( !$mobile ) { ?>

		<div class="column small-4">
			<?php echo wp_get_attachment_image( $imgs['1']['id'], 'blog_large', '', array('class' => 'rounded') ); ?>
		</div>

		<?php } ?>

	</div>

</section>

<?php
endif;