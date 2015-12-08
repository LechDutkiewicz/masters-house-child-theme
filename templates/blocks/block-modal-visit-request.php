<div id="visit-modal" class="reveal-modal small" data-css-top="15">
	<div class="modal-header bg-<?php echo bon_get_option( 'search_button_color', 'peter-river' ); ?>">
		<span class="modal-title like-h4 text-white" id="visit-modal-label"><?php _e( 'Request a free visit', 'bon' ); ?></span>
	</div>
	<div class="modal-body">
		<form action="" method="post" id="visit-requestform" class="modal-form">
			<div class="row">
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
				<div>
					<input type="hidden" name="subject" value="<?php echo "[" . __( 'Free visit request', 'bon' ) . "]"; ?>" />
					<input type="hidden" name="receiver" value="<?php echo get_option( 'admin_email' ); ?>" />
					<input type="hidden" name="messages" value="<?php _e( 'Visit request', 'bon' ); ?>" />
					<button class="flat button <?php echo bon_get_option( 'cta_button_color', 'emerald' ); ?> radius submit" id="submit" <?php the_ga_event( "Contact", "Click Send", "Visit Request Form" ); ?>/><?php _e( 'Request a free visit', 'bon' ) ?></button>
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