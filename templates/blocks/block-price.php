<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Shandora price section
 * This block handles price displayed on product page
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
$packages = get_packages_list();
?>


<div class="price-box">
	<div class="text-center">
		<div class="price text-main"><?php shandora_get_listing_price( true, true, true ); ?></div>
		<small>(<?php _e( 'includes VAT', 'bon' ); ?>)</small>
	</div>
	<?php if ( shandora_get_meta( $post->ID, 'listing_enable_packages' ) && !defined('PACKAGE_FORM') ) { ?>

	<form class="custom package-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" name="package-form">
		<div class="row">
			<div class="column large-12 search-order">
				<select name="package_form">

					<?php
					if ( $packages !== null )
					{
						foreach ($packages as $key => $package)
						{
							?>

							<option value="<?php echo sanitize_text_field( $package['package_name'] ); ?>"<?php if ($key === 0) echo ' selected="selected"'; ?>><?php echo $package['package_name']; ?></option>

							<?php
						}
					}
					?>

				</select>
				<input type="hidden" id="post_id" name="post_id" value="<?php echo $post->ID; ?>">
			</div>
		</div>
	</form>

	<?php define('PACKAGE_FORM', true); ?>

	<?php } ?>

</div>

<a href="#" role="button" data-reveal-id="contact-modal" class="flat button <?php echo $button_color = bon_get_option( 'cta_button_color', 'emerald' ); ?> radius cta expand" title="<?php echo __( 'Contact us', 'bon' ) . ' ' . __( 'and order your cottage', 'bon' ); ?>" data-modal-title="<?php echo __( 'Contact us', 'bon' ) . ' ' . __( 'and order your cottage', 'bon' ); ?>" <?php the_ga_event( array( 'CTA', 'Click buy', defined('CTA_EXISTS') ? 'Bottom': 'Top' ), array( "Contact", "Open", "Order" ) ); ?>>
	<span class="cta-headline"><?php _e( 'Contact us', 'bon' ); ?></span><span class="cta-subline"><?php _e( 'and order your cottage', 'bon' ); ?></span>
</a>

<?php define('CTA_EXISTS', true); ?>
