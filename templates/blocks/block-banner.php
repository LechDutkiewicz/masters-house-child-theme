<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

// setup vars
$link = shandora_get_meta( $post->ID, "banner_link" );
?>
<li>
    <?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'size' => 'banner', 'link_to_post' => false, 'image_class' => 'auto', 'image_alt' => get_the_title()  ) ); ?>
    <a href="<?php echo get_the_permalink( $link ); ?>" class="button flat radius small main" <?php the_ga_event( "Banners", "Click", get_the_title() ); ?>><?php _e( "Read more", "bon" ); ?></a>
</li>