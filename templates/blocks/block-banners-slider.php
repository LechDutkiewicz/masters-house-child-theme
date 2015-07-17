<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<?php
/*$features = bon_get_option( 'features_section_image' );
$tool = bon_get_option( 'tool_section_image' );
$quality = bon_get_option( 'quality_section_image' );*/

$banners = array();

for ( $i = 1; $i <= 3; $i++ ) {
    array_push( $banners, bon_get_option( $i . '_slide' ) );
}
    ?>

    <?php if (!empty($banners)) { ?>

    <section class="padding-large top bottom">
        <ul class="slides bxslider-no-thumb-no-controls autostart" data-pause="5000">
            <?php foreach ( $banners as $index => $banner ) { ?>

            <?php if ( $banner ) { ?>

            <li>
                <?php echo shandora_get_banner_opening_tag( $index + 1 ); ?>
                <?php echo wp_get_attachment_image( pippin_get_image_id( $banner ), 'full', '', array('class' => '') ); ?>
                <div class="overlay"></div>
                <?php echo shandora_get_banner_closing_tag( $index + 1 ); ?>
            </li>
            
            <?php } ?>

            <?php } ?>
        </ul>
        <?php foreach ( $banners as $index => $banner ) { ?>
        <?php get_modal( $index + 1 ); ?>
        <?php } ?>
    </section>

    <?php } ?>