<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Contact form + faq
 * This block renders div with 2 tabs - one with contact form, second one with faq
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://techsavvymarketers.pl
 * @since		Version 1.0
 * @package 	Blocks
 * @category 	Block
 *
 *
 */
?>
<div id="detail-tab" class="column tabs-container large-12">
	<section>
		<nav class="tab-nav">
			<a class="active" href="#tab-target-contact"><?php _e( 'Contact', 'bon' ); ?></a>
			<a href="#tab-target-faq"><?php _e( 'FAQ', 'bon' ); ?></a>
		</nav>
		<div class="tab-contents">
			<div id="tab-target-contact" class="tab-content active">

				<?php bon_get_template_part( 'forms', 'agent-contactform' ); ?>
				
			</div>
		</div>
		<div class="tab-contents">
			<div id="tab-target-faq" class="tab-content">
				<?php bon_get_template_part( 'block', 'listing/faq' ); ?>						
			</div>
		</div>
	</section>
</div>