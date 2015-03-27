<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Shandora packages for cottages layout
 * This block handles packages displayed on the product page
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

$prefix = bon_get_prefix();
$suffix = SHANDORA_MB_SUFFIX;
$packages = get_packages_list();

?>

<div id="packages-tab" class="column large-12 tabs-container">
	<section>
		<nav class="tab-nav">
			<?php foreach ($packages as $key => $package) { ?>
			<a class="bg desaturate <?php echo $package['package_color']; ?><?php if ( $key === 0 ) echo ' active'; ?>" href="#tab-target-<?php echo sanitize_text_field( $package['package_name'] ); ?>"><?php echo $package['package_name']; ?></a>
			<?php } ?>
		</nav>
		<div class="tab-contents">
			<?php foreach ($packages as $key => $package) { ?>

			<?php $package_prefix = $suffix . $package['package_name']; ?>

			<div id="tab-target-<?php echo sanitize_text_field( $package['package_name'] ); ?>" class="tab-content<?php if ( $key === 0 ) echo ' active'; ?>">
				
				<p><?php echo get_post_meta( $post->ID, $prefix . $package_prefix . '_content', true ); ?></p>

				<ul class="property-details">

					<?php package_details( $id, $package_prefix ); ?>

				</ul>

			</div>
			<?php } ?>
		</div>
	</section>
</div>

