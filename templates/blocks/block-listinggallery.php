<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Shandora listing gallery
 * This block handles product gallery displayed on product page
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://techsavvymarketers.pl
 * @since		Version 1.1
 * @package 	Layouts
 * @category 	Layout
 *
 *
 */

// setup vars
$listing_gal = shandora_get_meta( get_the_ID(), 'listing_gallery' );

$layout = get_theme_mod( 'theme_layout' );

if ( $_SESSION['layoutType'] === 'mobile' ) {
	$image_size = 'mobile_regular';
	$thumbnail_size = 'listing_small_box_mobile';
} else {
	if ( $layout == '1c' ) {
		$image_size = 'featured_slider';
	} else {
		$image_size = 'listing_large';
	}
	$thumbnail_size = 'listing_small_box';
}
if ( $listing_gal ) {
	$attachments = array_filter( explode( ',', $listing_gal ) );

	if ( $attachments ) {
		?>
	<section>
		<div class="entry-gallery badge-container">
			<?php if ( get_post_type() == "listing" ) the_badge(); ?>
			<?php
			$with_thumbnail = bon_get_option( 'listing_gallery_thumbnail' );

			$ul_class = 'bxslider';
			if ( $with_thumbnail == 'no' ) {
				$ul_class = 'bxslider-no-thumb';
			} else if ( $with_thumbnail == 'both' ) {
				$ul_class = 'bxslider-both';
			}
			?>

			<ul class="<?php echo $ul_class; ?>">
				<?php
				foreach ( $attachments as $attachment_id ) {
					$meta = wp_get_attachment_metadata( $attachment_id );
					$popup = wp_get_attachment_image_src( $attachment_id, 'full' );
					$popup = $popup[0];
					$args = array( 'alt' => '' );
					$caption = '';

					if ( bon_get_option( 'show_gallery_caption', 'yes' ) == 'yes' ) {
						$caption = '<span class="caption">' . get_the_title( $attachment_id ) . '</span>';
					}

					echo '<li>' . $caption . '<a href="' . $popup . '" class="listing-gallery-popup">' . wp_get_attachment_image( $attachment_id, $image_size ) . '</a></li>';
				}
				?>
			</ul>
			<?php if ( $with_thumbnail == 'yes' || $with_thumbnail == 'both' ) : ?>
				<ul id="bx-pager" class="bx-pager medium-custom-grid-10 small-custom-grid-9 mobile-custom-grid-6">
					<?php
					$i = 0;
					foreach ( $attachments as $attachment_id ) {
						echo '<li><a data-slide-index="' . $i . '" href="">' . wp_get_attachment_image( $attachment_id, $thumbnail_size ) . '<span class="mask"></span></a></li>';
						$i++;
					}
					?>
				</ul>

			<?php endif; ?>
		</div>
	</section>
		<?php
	}
} else {

	if ( current_theme_supports( 'get-the-image' ) )
		get_the_image( array( 'size' => $image_size, 'before' => '<div class="featured-image">', 'after' => '</div>', 'image_class' => 'auto' ) );
}
?>