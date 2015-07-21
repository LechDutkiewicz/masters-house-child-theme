<div id="visit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="visit-modal-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-<?php echo bon_get_option( 'search_button_color', 'peter-river' ); ?>">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="visit-modal-label"><?php _e( 'Request a free visit', 'bon' ); ?></h4>
			</div>
			<div class="modal-body">
				<form action="" method="post" id="visit-requestform" class="modal-form">
					<div class="row">
						<div class="column large-12 small-11">											
							<?php the_contact_form_content(); ?>
							</div>
					</div>
					<div class="row input-container">
						<?php the_email_input(); ?>
					</div>									
					<div class="row input-container">
						<?php the_phone_input(); ?>
					</div>
					<div>
						<input type="hidden" name="subject" value="<?php echo "[" . __( 'Free visit request', 'bon' ) . "]"; ?>" />
						<input type="hidden" name="receiver" value="<?php echo get_option( 'admin_email' ); ?>" />
						<input type="hidden" name="messages" value="<?php _e( 'Visit request', 'bon' ); ?>" />
						<input class="flat button <?php echo bon_get_option( 'cta_button_color', 'emerald' ); ?> radius" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e( 'Request a free visit', 'bon' ); ?>" />
						<span class="contact-loader"><img src="<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/loader.gif" alt="loading..." />
					</div>
					<div class="sending-result"><div class="green bon-toolkit-alert"></div></div>
				</form>
			</div>
		</div>
	</div>
</div>