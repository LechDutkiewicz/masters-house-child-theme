<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<div id="newsletter-modal" class="reveal-modal large">
	<div class="modal-body">
		<div class="modal-inner-frame">
			<div class="modal-header">
				<div class="header-line line-before"></div>
				<span class="modal-title like-h4 uppercase"><?php _e( 'Subscribe to our newsletter', 'bon' ); ?></span>
				<div class="header-line line-after"></div>
			</div>
			<div class="modal-content-body">
				<div class="modal-claim like-h4 dotted text-center uppercase">
					<div class="topbottom"></div>
					<?php _e( 'You will be first to know about our news and special offers', 'bon' ); ?>
				</div>
				<form action="" method="post" id="newsletter-form" class="modal-form newsletter-forms">
					<fieldset>
						<div class="row collapse input-container">
							<div class='column small-12 input-container-alternate bordered name'>
								<input class="attached-input required" type="text" placeholder="<?php _e( 'Full Name', 'bon' ); ?>"  name="name" id="name" value="" size="22" tabindex="1" />
								<div class="contact-form-error" ><?php _e( 'Please enter your name.', 'bon' ); ?></div>
							</div>
						</div>
						<div class="row collapse input-container">
							<div class='column small-12 input-container-alternate bordered mail'>
								<input class="attached-input required email" type="email" placeholder="<?php _e( 'Email Address', 'bon' ); ?>"  name="email" id="email" value="" size="22" tabindex="2" />
								<div class="contact-form-error" ><?php _e( 'Please enter your email.', 'bon' ); ?></div>
							</div>
						</div>
						<div class="row collapse input-container">
							<input type="hidden" name="receiver" value="<?php echo bon_get_option( 'newsletter_email', get_bloginfo( 'admin_email' ) ); ?>" />
							<input type="hidden" name="country" value="<?php echo get_locale(); ?>'" />
							<div class='column small-12 input-container-alternate submit'>
								<button class="flat button dark-gray submit" id="submit" <?php the_ga_event( "Newsletter", "Subscribe", "Modal" ); ?>><?php _e( 'Subscribe', 'bon' ) ?></button>
								<span class="contact-loader"><img src="<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/loader.gif" alt="loading..." /></span>
							</div>
						</div>
						<div class="row collapse input-container">
							<div class="column small-12 input-container-alternate">
								<div class="sending-result">
									<div class="green bon-toolkit-alert"></div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<a class="close-reveal-modal" title="<?php _e( 'Close', 'bon'); ?>">&#215;</a>
		</div>
	</div>
</div>