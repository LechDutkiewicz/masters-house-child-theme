<?php
/*
 * Template Name: Testimonials
 */
get_header();

wp_enqueue_script( 'bon-toolkit-map' );
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

		do_atomic( 'before_loop' );
		?>

		<?php $testimonial_args = array(
			'post_type' => 'Testimonial',
			'posts_per_page' => -1
			);

			$wp_query = new WP_Query($testimonial_args); ?>

			<?php $marker = BON_TOOLKIT_IMAGES . '/marker-blue.png'; ?>

			<div id="googleMap" class="entry-row" style="height:600px; width:100%;" data-marker="<?php echo $marker; ?>" data-zoom="6">
				<?php //echo apply_atomic_shortcode( 'listing_map', '[bt-map color="blue" zoom="3" width="100%" height="400px"]' );?> 
			</div>
			<script type="text/javascript">
			var coordinates = [];
			var infoWindows = [];
			<?php
			$i = 0;
			while ( have_posts() ) : the_post();
				$cottage = shandora_get_meta( $post->ID, 'related_cottage' );
			?>
				coordinates[<?php echo $i; ?>] = {'id': <?php echo $post->ID; ?>,'latitude': <?php echo shandora_get_meta( $post->ID, 'maplatitude' ); ?>,'longitude': <?php echo shandora_get_meta( $post->ID, 'maplongitude' ); ?>};
				<?php if ( !empty($cottage) ) : ?>
				infoWindows[<?php echo $i; ?>] =
				'<div id="content" style="width:267px">'+
					'<div class="listings">'+
						'<article>'+
							'<h4 id="firstHeading" class="firstHeading"><?php the_title(); ?></h4>'+
							'<header class="entry-header">'+
								'<?php if ( has_post_thumbnail && current_theme_supports( "get-the-image" ) ) get_the_image( array( "size" => "listing_small", "link_to_post" => false, "image_class" => array( "auto" ) ) ); ?>'+
							'</header>'+
							'<div class="entry-summary">'+
								'<h4 class="entry-title">'+'<?php echo get_the_title($cottage); ?>'+'</h4>'+
							'</div>'+
						'<footer class="entry-footer property-price">'+
							'<a href="<?php echo get_permalink($cottage); ?>">'+'<?php _e( "Read more", "bon"); ?>'+'</a>'+
						'</footer>'+
					'</article>'+
				'</div>'+
			'</div>';
				
			<?php
				endif;
				$i++;
			endwhile;
			?>
			</script>

			<?php wp_reset_query(); ?>

			<?php bon_get_template_part( 'block', 'featured-slider' ); ?>

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

	<script type="text/javascript">
	(function($){
		$(document).ready(function(){

			var container = $('#googleMap'),
			marker = container.data('marker');

			$.each(coordinates, function(i, item){
				if (infoWindows[i]) {
					this.infoWindows = infoWindows[i];
				}
			});

			mapWidgets.init(container, {
				lat: <?php echo bon_get_option('global_latitude'); ?>,
				lng: <?php echo bon_get_option('global_longitude'); ?>,
				startZoom: <?php echo bon_get_option('global_zoom'); ?>,
				markerImage: marker,
				markersList: coordinates
			});

		});
	})(jQuery);
	</script>

	<?php get_footer(); ?>
