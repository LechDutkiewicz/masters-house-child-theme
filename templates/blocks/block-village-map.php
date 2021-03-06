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
$thumb_size = 'listing_list';

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
		translatedView = '<?php _e('View', 'bon'); ?>',
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
				$output .= '},';

				echo $output;
			}
			?>
		};

		</script>

		<figure id="canvas">
			<?php echo file_get_contents( trailingslashit( BON_THEME_URI ) . 'assets/images/village-map/village-map-wide.svg' ); ?>
			<div class="thumbnails"></div>
		</figure>

	</div>
</div>
</section>