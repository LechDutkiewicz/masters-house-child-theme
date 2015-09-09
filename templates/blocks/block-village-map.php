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
?>

<section>
	<div class="row entry-row">
		<div class="column large-12">

			<script>

			var cottages = {<?php
				foreach ( $cottages = get_village_map() as $key => $cottage )
				{
					echo PHP_EOL;
					$output = $key . ":";
					$output .= '{';
					$output .= "'id':" . "'". $cottage['id'] ."',";
					$output .= "'format':" . "'". $cottage['format'] ."',";
					$output .= "'url':" . "'". $cottage['url'] ."'";
					$output .= '},';

					echo $output;
				}
				?>
			};

			</script>

			<?php echo file_get_contents( trailingslashit( BON_THEME_URI ) . 'assets/images/village-map/village-map.svg' ); ?>

		</div>
	</div>
</section>