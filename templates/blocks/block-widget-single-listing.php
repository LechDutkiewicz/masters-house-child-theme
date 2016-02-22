<div class="featured-item">
	<?php
	if ( current_theme_supports( 'get-the-image' ) ) { ?>
	<a href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute( array('before' => __('Permalink to ','bon') ) ); ?>" <?php the_ga_event( 'Cottage List', 'Pick single cottage', 'Featured' ); ?>>
		<?php
		if ( $_SESSION['layoutType'] === 'mobile' ) {
			$src = get_the_image( array( 'size' => 'mobile_regular', 'before' => '<div class="featured-image">', 'after' => '</div>', 'link_to_post' => false ) );
		} else {
			$src = get_the_image( array( 'size' => 'listing_medium', 'before' => '<div class="featured-image">', 'after' => '</div>', 'link_to_post' => false ) );
		}
		?>
	</a>
	<?php
}
?>
<?php
										// edited by Lech Dutkiewicz
$lotsize = shandora_get_meta( get_the_ID(), 'listing_lotsize' );
$sizemeasurement = bon_get_option( 'measurement' );
$price = shandora_get_meta( get_the_ID(), 'listing_price' );
$currency = bon_get_option( 'currency' );
?>
<span class="featured-item-meta hide-for-small lotsize"><?php echo $lotsize . ' ' . $sizemeasurement; ?></span>
<span class="featured-item-meta hide-for-small price"><?php echo $price . ' ' . $currency; ?></span>
<div class="featured-item-title">
	<h4 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h4>
</div>
</div>