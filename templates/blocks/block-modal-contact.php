<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<div id="contact-modal" class="reveal-modal medium" data-css-top="15">
	<div class="modal-header bg-<?php echo bon_get_option( 'search_button_color', 'red' ); ?>">
		<span class="modal-title like-h4 text-white" id="contact-modal-label"><?php echo __( 'Contact us', 'bon' ) . ' ' . __( 'and order your cottage', 'bon' ); ?></span>
	</div>
	<div class="modal-body">
		<form action="" method="post" id="contact-requestform" class="modal-form">
			<div class="row collapse input-container">
				<div class="column large-12 small-11">											
					<?php the_contact_form_content(); ?>
				</div>
			</div>
			<fieldset>
				<legend><?php _e( 'Please fill fields below', 'bon' ); ?></legend>
				<div class="row collapse input-container">
					<?php the_email_input(); ?>
				</div>									
				<div class="row collapse input-container">
					<?php the_phone_input(); ?>
				</div>
				<div class="row collapse textarea-container input-container">
					<?php the_textarea(); ?>
				</div>
				<div>
					<input type="hidden" name="subject" value="<?php printf( __( 'Email from %s', 'bon' ), get_the_title() ); ?>" />
					<input type="hidden" name="listing_id" value="<?php echo $post->ID; ?>" />
					<input type="hidden" name="receiver" value="<?php echo get_option( 'admin_email' ); ?>" />
					<input type="hidden" name="title" value="<?php echo get_the_title(); ?>" />
					<input type="hidden" name="messages_default" value="<?php _e( 'Buy it request from the website', 'bon' ); ?>" />
					<button class="flat button <?php echo bon_get_option( 'cta_button_color', 'emerald' ); ?> radius submit" id="submit" <?php the_ga_event( "Contact", "Click Send", "Contact Form" ); ?>/><?php _e( 'Send', 'bon' ) ?></button>
					<span class="contact-loader"><img src="<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/loader.gif" alt="loading..." /></span>
				</div>
				<div class="sending-result">
					<div class="green bon-toolkit-alert"></div>
				</div>
			</fieldset>
		</form>
	</div>
	<a class="close-reveal-modal" title="<?php _e( 'Close', 'bon'); ?>">&#215;</a>
</div>