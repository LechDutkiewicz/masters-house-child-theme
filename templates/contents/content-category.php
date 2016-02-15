<?php

if ( !defined( 'ABSPATH' ) )
    exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<li class="<?php echo extra_class($post->ID); ?>">
    <article id="post-<?php echo $post->ID; ?>" <?php post_class("hover-shadow"); ?> >
        <header class="entry-header">
            <a class="header-link product-link" href="<?php echo get_term_link( $term->slug, "property-type" ); ?>">
                <div class="overlay"></div>
                <?php
                if ( current_theme_supports( 'get-the-image' ) ) {
                    if ( $_SESSION['layoutType'] === 'mobile' ) {
                        $size = 'mobile_tall';
                    } else {
                        $size = 'listing_small';
                    }
                    $src = get_the_image( array( 'size' => $size, 'link_to_post' => false, 'image_class' => 'auto' ) );
                }
                ?>
            </a>
        </header>
        <footer class="entry-footer">
            <div class="property-price cat-link"><a href="<?php echo get_term_link( $term->slug, "property-type" ); ?>" class="product-link <?php echo $color['color']; ?>"><?php echo $term->name; ?></a></div>
        </footer>
    </article>
</li>