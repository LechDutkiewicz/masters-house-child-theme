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

<div id="packages-tab" class="collapse column large-12 tabs-container">
	<section class="padding-large bottom">
		<nav class="tab-nav">
			<?php foreach ($packages as $key => $package) { ?>
			<a class="<?php if ( $key === 0 ) echo ' active'; ?> darken-hover" href="#tab-target-<?php echo sanitize_title( $package['package_name'] ); ?>"><?php echo $package['package_name']; ?></a>
			<?php } ?>
		</nav>
		<div class="tab-contents">
			<?php foreach ($packages as $key => $package) { ?>

			<?php $package_prefix = $suffix . $package['package_name']; ?>

			<div id="tab-target-<?php echo sanitize_title( $package['package_name'] ); ?>" class="tab-content<?php if ( $key === 0 ) echo ' active'; ?> border-main">
				
				<?php // Uncomment this if each product would have it's own package descriptions
				/* echo get_post_meta( $post->ID, $prefix . $package_prefix . '_content', true );*/ ?>

				<?php shandora_sanitize_content($package['package_desc']); ?>

				<hr>

				<ul class="property-details margin-medium top">

					<?php // Uncomment this if each product would have it's own package descriptions
					/*package_details( $id, $package_prefix ); */?>
					
					<?php packages_details( $id, $package_prefix, $package['package_name'] ); ?>

				</ul>

			</div>
			<?php } ?>
		</div>
	</section>
</div>

