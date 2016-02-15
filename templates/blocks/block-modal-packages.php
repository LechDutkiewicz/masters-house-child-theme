<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<div id="packages-modal" class="reveal-modal large">
	<div class="modal-header bg-<?php echo bon_get_option( 'search_button_color', 'red' ); ?>">
		<span class="modal-title like-h2 text-white"><?php _e( 'More information about packages', 'bon' ); ?></span>
	</div>
	<div class="modal-body">
		<div class="row">
			<?php bon_get_template_part( 'block', 'listing/packages' ); ?>
		</div>
	</div>
	<a class="close-reveal-modal" title="<?php _e( 'Close', 'bon'); ?>">&#215;</a>
</div>