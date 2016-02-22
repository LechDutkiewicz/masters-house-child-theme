<?php
/*
 * Template Name: About us
 */
get_header();
?>
<div id="inner-wrap" class="<?php echo shandora_is_home() ? 'home ' : ''; ?>slide">

	<div id="body-container" class="container">

		<?php
		/**
		 * Shandora Before Loop Hook
		 *
		 * @hooked shandora_get_page_header - 1
		 * @hooked shandora_open_main_content_row - 5
		 * @hooked shandora_open_main_content_column - 15
		 * @hooked shandora_get_right_sidebar - 10
		 *
		 */
		$headFirst = bon_get_option( 'about_us_heading_first' );
		$contentFirst = bon_get_option( 'about_us_content_first' );
		$headSecond = bon_get_option( 'about_us_heading_second' );
		$imgSecond = pippin_get_image_id( bon_get_option( 'about_us_img_second', 'yes' ) );
		$contentSecond = bon_get_option( 'about_us_content_second' );
		$headAdvantages = bon_get_option( 'about_us_heading_advantages' );
		$advantages = bon_get_option( 'about_us_advantages' );
		$headTeam = bon_get_option( 'about_us_heading_team' );
		$contentTeam = bon_get_option( 'about_us_content_team' );
		$headContact = bon_get_option( 'about_us_heading_contact' );
		$contentContact = bon_get_option( 'about_us_content_contact' );
		$agent_id = bon_get_option( 'global_agent' )[0];
		$agent_email = shandora_get_meta( $agent_id, 'agentemail' );
		if ( empty( $agent_email ) ) {
			$agent_email = get_option( 'admin_email' );
		}
		if ( $_SESSION['layoutType'] === 'mobile' ) {
			$size = 'mobile_agent_large';
		} else {
			$size = 'agent_large';
		}

		do_atomic( 'before_loop' );
		?>

		<?php if ( $_SESSION['layoutType'] !== 'mobile' ) { ?>
		<!-- house with bubbles -->
		<section id="quality-container" class="row entry-content show-for-medium-up">
			<?php bon_get_template_part( 'block', 'house-bubbles' ); ?>
		</section>
		<?php } ?>

		<!-- header section with first paragraph -->
		<section class="row entry-content">

			<?php if ( $headFirst && $contentFirst ) { ?>

			<header class="column medium-<?php echo ( $headAdvantages && !empty( $advantages ) ) ? '8' : '12'; ?>">
				<h3 ><?php echo $headFirst; ?></h3>
				<hr />
				<span><?php echo $contentFirst; ?></span>
			</header>	

			<?php } ?>		

			<?php if ( $headAdvantages && !empty( $advantages ) ) { ?>

			<div class="column medium-<?php echo ( $headFirst && $contentFirst ) ? '4' : '12'; ?>">
				<h3 ><?php echo $headAdvantages; ?></h3>
				<hr />
				<div class="adv-result">

					<?php foreach ( $advantages as $advantage ) { ?>

					<div class="adv-option">
						<div class="adv-details">
							<span class="option-label"><?php echo $advantage['advantage_name']; ?></span>
						</div>
						<div class="adv-icon">
							<i class="sha-check-round-2"></i>
						</div>
						<div class="adv-result"></div>
					</div>

					<?php } ?>

				</div>
			</div>

			<?php } ?>	

		</section>

		<!-- section with company features -->
		<?php bon_get_template_part( 'block', 'listing/home-features' ); ?>

		<!-- section about wood -->
		<section class="row entry-content">

			<?php if ( $headSecond && $contentSecond && $imgSecond ) { ?>

			<header class="column medium-12">
				<h3 ><?php echo $headSecond; ?></h3>
				<hr />
			</header>
			<div class="column large-6">
				<span><?php echo $contentSecond; ?></span>
			</div>
			<div class="column large-6 show-for-large-up">
				<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'post_id' => $imgSecond, 'size' => 'listing_medium', 'link_to_post' => false, 'image_class' => array('auto', 'boxed') ) ); ?>
			</div>

			<?php } ?>

		</section>

		<?php bon_get_template_part( 'block', 'testimonials-slider' ); ?>

		<section id="agent-contact" class="row entry-content">

			<?php if ( $headTeam && $contentTeam ) { ?>

			<div class="listing-contact">
				<header class="column medium-12">
					<h3><?php echo $headTeam; ?></h3>
					<hr />
				</header>
				<div class="column medium-9 small-8 agent-detail">
					<h3 class="subheader agent-name"><?php echo get_the_title( $agent_id ); ?></h3>
					<h4><?php echo shandora_get_meta( $agent_id, 'agentjob' ); ?></h4>
					<span><?php echo $contentTeam; ?></span>

					<?php if ( shandora_get_meta( $agent_id, 'agentmobilephone' ) ) { ?> 

					<div class="agent-info">
						<strong><?php _e( 'Mobile:', 'bon' ); ?></strong>
						<span><?php echo shandora_get_meta( $agent_id, 'agentmobilephone' ); ?></span>
					</div>

					<?php } ?>

					<?php if ( shandora_get_meta( $agent_id, 'agentofficephone' ) ) { ?>

					<div class="agent-info">	
						<strong><?php _e( 'Offce:', 'bon' ); ?></strong>
						<span><?php echo shandora_get_meta( $agent_id, 'agentofficephone' ); ?></span>
					</div>

					<?php } ?>

					<?php if ( shandora_get_meta( $agent_id, 'agentfax' ) ) { ?>

					<div class="agent-info">			
						<strong><?php _e( 'Fax:', 'bon' ); ?></strong>
						<span><?php echo shandora_get_meta( $agent_id, 'agentfax' ); ?></span>
					</div>

					<?php } ?>	

				</div>
				<div class="column medium-3 small-4 agent-detail">				
					<figure>
						<?php
						if ( current_theme_supports( 'get-the-image' ) )
							get_the_image( array( 'post_id' => $agent_id, 'size' => $size, 'link_to_post' => false, 'image_class' => 'auto' ) );
						?>
					</figure>
				</div>
			</div>

			<?php } ?>

		</section>

		<section class="row entry-content">

			<?php if ( $headContact ) { ?>

			<header class="column medium-12">
				<h3><?php echo $headContact; ?></h3>
				<hr />
			</header>
			<div class="column medium-12">
				<p><?php echo $contentContact; ?></p>
			</div>
			<?php bon_get_template_part( 'block', 'contactform-faq' ); ?>
			<?php } ?>

		</section>

		<?php wp_reset_query(); ?>
		<?php
		/**
		 * Shandora After Loop Hook
		 *
		 * @hooked shandora_close_main_content_column - 1
		 * @hooked shandora_get_right_sidebar - 5
		 * @hooked shandora_close_main_content_row - 10
		 *
		 */
		do_atomic( 'after_loop' );
		?>

	</div>


	<?php get_footer(); ?>
