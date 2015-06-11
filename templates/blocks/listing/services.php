<?php if ( $_SESSION['layoutType'] === 'mobile' ) $exClass = 'text-center'; ?>
<?php if ( is_singular( 'listing' ) ) : ?>
	<header>
		<h3 class="services-header"><?php _e( 'With us you will', 'bon' ); ?></h3>
		<hr />
	</header>
<?php else: ?>
<?php endif; ?>
<?php
$args = array(
	'post_type' => 'service',
	'posts_per_page' => 10,
	'orderby' => 'menu_order',
	'order' => 'ASC'
	);
$loop = new WP_Query( $args );
if ( !empty( $loop->posts ) ) :
	?>
<div class="row">
	<?php while ( $loop->have_posts() ) : $loop->the_post();

	// setup variables
	$more_title = shandora_get_meta( $post->ID, 'service_more_title' );
	$more_content = shandora_get_meta( $post->ID, 'service_more_content', false, false );
	$sanitazed_title = sanitize_title( $more_title );

	?>

	<div class="column large-12 service-container <?php echo $exClass; ?>">
		<div class="round-icon icon-wrapper bg-flat-<?php echo shandora_get_meta( $post->ID, 'serviceiconcolor' ); ?>">
			<i class="icon-anim-left-right text bonicons <?php echo shandora_get_meta( $post->ID, 'serviceicon' ); ?>"></i>
		</div>
		<div class="service-content">
			<h3 class="service-title"><?php the_title(); ?></h2>
			<p class="entry-content"><?php echo get_the_content(); ?>

				<?php // create read more button to open modal with extended information if it's available ?>
				<?php if ( $more_title && $more_content ) { ?>

				<a href="#<?php echo sanitize_title( $more_title ); ?>" role="button" data-toggle="modal" class="button flat main radius tiny" title="">
					<span class="cta-headline"><?php _e( 'Read more', 'bon'); ?></span>
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
				<div class="modal-header bg <?php echo bon_get_option( 'search_button_color', 'red' ); ?>">
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

