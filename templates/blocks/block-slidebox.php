<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

$size = 'listing_medium';

global $_wp_additional_image_sizes;
$width = $_wp_additional_image_sizes[$size]['width'] + 50;

?>

<?php

$args = array(
	'post_type' => 'Slidebox',
	'posts_per_page' => 1,
	'orderby' => 'menu_order'
);

$list = new WP_query( $args );

if ( isset( $_COOKIE['slidebox'] ) && $_COOKIE['slidebox'] )
	$exClass='hidden';

if ($list->have_posts()) : while ($list->have_posts()) : $list->the_post();
?>

<div id="slidebox" <?php echo $exClass ? "class='$exClass' " : ''; ?>style="width: <?php echo $width; ?>px">

	<div class="slidebox-close bg-clouds darken-hover">
		<span class="bonicons bi-chevron-<?php echo $exClass ? 'up': 'down'; ?>"></span>
		<span class="bonicons bi-chevron-<?php echo $exClass ? 'up': 'down'; ?>"></span>
		<span class="rotated-text"><?php _e( 'Hide', 'bon'); ?></span>
		<span class="sr-only"><?php _e( 'Close', 'bon'); ?></span>
	</div>

	<div class="slidebox-inner">
		
		<a class="hover-mask only-expanded" href="<?php echo get_permalink( shandora_get_meta( $post->ID, 'slidebox_link' ) ); ?>" title="<?php echo __( 'Link to', 'bon') . ' ' . get_the_title( shandora_get_meta( $post->ID, 'slidebox_link' ) ); ?>">
			<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'attachment' => false, 'size' => $size, 'link_to_post' => false, 'before' => '<div class="slidebox-image">', 'after' => '</div>', 'image_class' => array('auto', 'margin-medium', 'bottom') ) ); ?>
			<div class="overlay"></div>
		</a>

		<?php if ( $title = shandora_get_meta( $post->ID, 'slidebox_title' ) ) { ?>
		<span class="like-h3"><?php echo $title; ?></span>
		<?php } ?>

		<?php if ( $anchor = shandora_get_meta( $post->ID, 'slidebox_anchor' ) ) { ?>
		<a class="right button flat radius small cta <?php echo shandora_get_meta( $post->ID, 'slidebox_color' ); ?> only-expanded" href="<?php echo get_permalink( shandora_get_meta( $post->ID, 'slidebox_link' ) ); ?>" title="<?php echo __( 'Link to', 'bon') . ' ' . get_the_title( shandora_get_meta( $post->ID, 'slidebox_link' ) ); ?>">
			<?php echo $anchor; ?>
		</a>
		<?php } ?>

	</div>
</div>
<?php
endwhile;
endif;
wp_reset_query();
?>