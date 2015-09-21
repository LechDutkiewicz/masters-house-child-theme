<?php if ( $_SESSION['layoutType'] === 'mobile' ) $exClass = 'text-center'; ?>

<?php

$args = array(
	'post_type' => 'home-feature',
	'posts_per_page' => 10,
	'orderby' => 'menu_order',
	'order' => 'ASC'
	);
$loop = new WP_Query( $args );

if ( !empty( $loop->posts ) ) :
	?>

<div class="row">

	<?php if ( pippin_get_image_id( bon_get_option( 'features_section_image', 'yes' ) ) && !shandora_is_home() && $_SESSION['layoutType'] !== 'mobile' ) { ?>
	<div class="column large-12 margin-large bottom">
		<?php echo wp_get_attachment_image( pippin_get_image_id( bon_get_option( 'features_section_image', 'yes' ) ), 'full', '', array('class' => '') ); ?>
	</div>
	<?php } ?>

</div>

<div id="services-container" class="row services-container">

	<?php while ( $loop->have_posts() ) : $loop->the_post();

		?>

		<div class="column large-12 service-container padding-medium top bottom <?php echo $exClass; ?> clearfix">
			<div class="round-icon icon-wrapper bg-<?php echo shandora_get_meta( $post->ID, 'featureiconcolor' ); ?>">
				<i class="icon-anim-left-right text bonicons <?php echo shandora_get_meta( $post->ID, 'featureicon' ); ?>"></i>
			</div>
			<div class="service-content">
				<span class="like-h4 fade-in"><?php the_title(); ?></span>
				<p class="entry-content"><?php echo get_the_content(); ?>

					<?php // create read more button to open modal with extended information if it's available ?>
					<?php if ( $more_title && $more_content ) { ?>

					<a href="#<?php echo sanitize_title( $more_title ); ?>" role="button" data-toggle="modal" class="button flat main radius tiny" title="">
						<span class="cta-headline"><?php _e( 'Read more', 'bon'); ?></span>
					</a>

					<?php } ?>

					<?php if ( shandora_get_meta( $post->ID, 'feature_scroll_to' ) && is_singular( 'listing' ) && $_SESSION['layoutType'] !== 'mobile' ) { ?>

					<a href="#faq" role="button" class="button flat main radius tiny scrollTo" title="<?php _e( 'Ask a question', 'bon'); ?>"  data-modal-title="<?php echo __( 'Contact us', 'bon' ) . ' ' . __( 'and order your cottage', 'bon' ); ?>" <?php the_ga_event( "FAQ", "Click Ask a Question From Services Button" ); ?>>
						<span class="cta-headline"><?php _e( 'Ask a question', 'bon'); ?></span>
					</a>

					<?php } ?>

				</p>
			</div>
		</div>

		<?php // create modal with extended information if it's available ?>
		<?php if ( $more_title && $more_content ) { ?>

		<div id="<?php echo $sanitazed_title; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="<?php echo $sanitazed_title; ?>-modal-label" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-<?php echo bon_get_option( 'search_button_color', 'red' ); ?>">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="<?php echo $sanitazed_title; ?>-modal-label"><?php echo $more_title ?></h4>
					</div>
					<div class="modal-body">
						<?php shandora_sanitize_content($more_content); ?>
					</div>
				</div>
			</div>
		</div>

		<?php } ?>

		<?php endwhile;
		?>

	</div>
	
	<?php
	endif;
	wp_reset_query();

