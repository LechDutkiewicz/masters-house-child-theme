<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<?php
$args = array(
	'post_type' => 'faq',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC'
	);
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
	if ( is_singular( 'listing' ) ) {
		?>
		<section class="padding-large top bottom" id="faq">
			<header>
				<h2><?php _e( 'FAQ', 'bon' ); ?></h2>
				<hr />
			</header>
			<?php } ?>
			<ul class="bon-toolkit-accordion" id="accordion-faq">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php if ($loop->current_post == 5 && is_singular( 'listing' ) ) { ?>
				<div class="collapse panel-collapse" id="faqCollapse">
					<div class="well">
						<?php } ?>
						<li class="accordion-group">
							<input type="radio" name="toggle-section-faq" id="toggle-target-<?php echo $loop->current_post + 20; ?>" <?php if ($loop->current_post == 0) echo 'checked="checked"'; ?>>
							<label for="toggle-target-<?php echo $loop->current_post + 20; ?>" class="accordion-section-title" <?php the_ga_event( "FAQ", "Pick a Question", get_the_title() ); ?>><?php the_title(); ?></label>
							<span class="accordion-open"><i class="sha-arrow-down"></i></span>
							<span class="accordion-close"><i class="sha-arrow-right"></i></span>
							<div class="toggle-content"><?php echo get_the_content(); ?></div>
						</li>
						<?php if ( $loop->current_post + 1 == $loop->post_count && $loop->post_count > 5 && is_singular( 'listing' ) ) { ?>
					</div>
				</div>
				<?php }
				endwhile; ?>
			</ul>
			<?php if ($loop->post_count > 5 && is_singular( 'listing' ) ) { ?>
			<a class="button flat main radius" data-toggle="collapse" href="#faqCollapse" aria-expanded="false" aria-controls="faqCollapse" title="<?php _e( 'Show more', 'bon'); ?>" <?php the_ga_event( "FAQ", "Click Show More" ); ?>>
				<?php _e('Show more questions', 'bon'); ?>
			</a>
			<?php } ?>
			<a href="#contact-modal" role="button" data-toggle="modal" class="button flat <?php echo $button_color = bon_get_option( 'search_button_color', 'emerald' ); ?> radius" title="<?php _e( 'Leave us a message', 'bon'); ?>" data-modal-title="<?php _e( 'Leave us a message', 'bon'); ?>" <?php the_ga_event( array( "FAQ", "Click to Ask Another Question" ), array( "Contact", "Open", "FAQ" ) ); ?>>
				<span class="cta-headline"><?php _e( 'Ask another question', 'bon'); ?></span>
			</a>
			<?php bon_get_template_part( 'block', 'modal-contact'); ?>
			<?php wp_reset_query();	?>
			<?php if ( is_singular( 'listing' ) ) { ?>
		</section>
		<?php }
	} ?>
