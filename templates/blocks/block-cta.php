<?php
if ( $_SESSION['layoutType'] === 'mobile' ) {
	$size = 'mobile_regular';
} else {
	$size = 'listing_two_thirds';
}
?>
<section class="bottom-cta">
	<header>
		<h3 class="cta-header"><?php the_title(); ?></h3>
		<hr />
	</header>
	<div class="row entry-content">
		<div class="column large-8">
			<div class="badge-container">
				<?php the_badge(); ?>
				<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'attachment' => false, 'size' => $size, 'link_to_post' => false, 'before' => '<div class="featured-image">', 'after' => '</div>', 'image_class' => 'auto', 'itemprop' => true ) ); ?>
			</div>
		</div>
		<div class="column large-4">
			<?php bon_get_template_part( 'block', 'block-price' ); ?>
		</div>
	</div>
</section>