<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<div id="customize-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="customize-modal-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-<?php echo bon_get_option( 'search_button_color', 'red' ); ?>">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="customize-modal-label"><?php _e( 'Contact us', 'bon' ); ?></h4>
			</div>
			<div class="modal-body">
				<form action="" method="post" id="customize-requestform" class="modal-form">
					<div class="row collapse input-container">
						<div class="column large-12 small-11">											
							<?php the_contact_form_content(); ?>
							</div>
					</div>
					<div class="row collapse input-container">
						<?php the_email_input(); ?>
					</div>									
					<div class="row collapse input-container">
						<?php the_phone_input(); ?>
					</div>
					<div class="row collapse textarea-container input-container">
						<?php the_textarea( 'required' ); ?>
					</div>
					<div>
						<input type="hidden" name="subject" value="<?php printf( __( 'Customization form from %s', 'bon' ), get_the_title() ); ?>" />
						<input type="hidden" name="listing_id" value="<?php echo $post->ID; ?>" />
						<input type="hidden" name="receiver" value="<?php echo get_option( 'admin_email' ); ?>" />
						<input type="hidden" name="title" value="<?php echo get_the_title(); ?>" />
						<input class="flat button <?php echo bon_get_option( 'cta_button_color', 'emerald' ); ?> radius" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e( 'Send', 'bon' ); ?>" <?php the_ga_event( "Contact", "Click Send", "Customize Form" ); ?> />
						<span class="contact-loader"><img src="<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/loader.gif" alt="loading..." />
					</div>
					<div class="sending-result"><div class="green bon-toolkit-alert"></div></div>
				</form>
			</div>
		</div>
	</div>
</div>