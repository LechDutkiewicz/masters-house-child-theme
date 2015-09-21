<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Shandora layout block
 * This block handles village map of already built cottages
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://techsavvymarketers.pl
 * @since		Version 1.0
 * @category 	Layout
 *
 *
 */

$cottages = get_village_map();
$thumbSize = '';

$detect = new Mobile_Detect;
if ( $detect->isMobile() && !$detect->isTablet() ) {
	$thumb_size = 'listing_list';
} else {
	$thumb_size = 'mobile_tall';
}

?>

<section>
	<div class="row entry-row">
		<div class="column large-12">

			<?php while ( have_posts() ) : the_post(); ?>

			<header id="map-header"><?php if ( (get_the_content()) !== "" )
			{
				the_content();
			}
			?></header>

		<?php endwhile; ?>

		<script>

		var thumbSize = '<?php echo $thumb_size; ?>',
		cottages = {<?php
			foreach ( $cottages as $key => $cottage )
			{
				echo PHP_EOL;
				$output = $key . ":";
				$output .= '{';
				$output .= "'id':" . "'". $cottage['id'] ."',";
				$output .= "'format':" . "'". $cottage['format'] ."',";
				$output .= "'url':" . "'". $cottage['url'] ."',";
				$output .= "'title':" . "'" . $cottage['title'] ."',";
				$output .= "'translatedView':" . "'". __( 'View', 'bon') ."'";
				$output .= '},';

				echo $output;
			}
			?>
		};

		</script>

		<figure id="canvas">
			<?php echo file_get_contents( trailingslashit( BON_THEME_URI ) . 'assets/images/village-map/village-map.svg' ); ?>	
		</figure>

	</div>
</div>
</section>