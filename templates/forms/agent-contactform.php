<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Custom form block
 * This block handles contact form to 1 agent
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://techsavvymarketers.pl
 * @since		Version 1.0
 * @category 	Forms
 *
 *
 */

// setup vars

$agent_id = bon_get_option( 'global_agent' )[0];
$agent_email = shandora_get_meta( $agent_id, 'agentemail' );

?>
<form action="" method="post" id="agent-contactform">
	<div class="row collapse input-container">
		<div class='column large-12 small-11 input-container-inner name'>
			<input class="attached-input required" type="text" placeholder="<?php _e( 'Full Name', 'bon' ); ?>"  name="name" id="name" value="" size="22" tabindex="1" />
			<div class="contact-form-error" ><?php _e( 'Please enter your name.', 'bon' ); ?></div>
		</div>
	</div>
	<div class="row collapse input-container">
		<div class='column large-12 small-11 input-container-inner mail'>
			<input class="attached-input required email" type="email" placeholder="<?php _e( 'Email Address', 'bon' ); ?>"  name="email" id="email" value="" size="22" tabindex="2" />
			<div class="contact-form-error" ><?php _e( 'Please enter your email.', 'bon' ); ?></div>
		</div>
	</div>
	<div class="row collapse input-container">
		<div class='column large-12 small-11 input-container-inner phone'>
			<input class="attached-input" type="text" placeholder="<?php _e( 'Phone Number (optional)', 'bon' ); ?>"  name="phone" id="phone" value="" size="22" tabindex="1" />
			<div class="contact-form-error" ><?php _e( 'Please enter your phone number.', 'bon' ); ?></div>
		</div>
	</div>
	<div class="row collapse textarea-container input-container" data-match-height>
		<div class='column large-12 small-11 input-container-inner pencil'>
			<textarea name="messages" class="attached-input required" id="messages" cols="58" rows="10" placeholder="<?php _e( 'Message', 'bon' ); ?>"  tabindex="4"></textarea>
			<div class="contact-form-error" ><?php _e( 'Please enter your messages.', 'bon' ); ?></div>
		</div>
	</div>
	<div>
		<input type="hidden" name="subject" value="<?php _e( 'Contact from About us Page', 'bon' ); ?>" />
		<input type="hidden" name="listing_id" value="" />
		<input type="hidden" name="receiver" value="<?php echo $agent_email; ?>" />
		<input class="flat button blue radius" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e( 'Submit', 'bon' ) ?>" <?php the_ga_event( "Contact", "Click Send", "Agent Form" ); ?>/>
		<span class="contact-loader"><img src="<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/loader.gif" alt="loading..." /></span>
	</div>
	<div class="sending-result"><div class="green bon-toolkit-alert"></div></div>
</form>