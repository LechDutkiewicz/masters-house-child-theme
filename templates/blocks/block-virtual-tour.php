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
$virtual_tour = shandora_get_meta( get_the_ID(), 'listing_360_view' );
if ($virtual_tour) { ?>

<div class="header-video video-container">

	<iframe width="1200" height="600" src="<?php echo 'http://' . getenv('HTTP_HOST') . '/360-view/' . $virtual_tour . '/index.html'; ?>" frameborder="0"></iframe>
	
</div>

<?php } ?>