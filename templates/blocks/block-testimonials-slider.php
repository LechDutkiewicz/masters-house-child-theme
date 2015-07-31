<?php
$prefix = bon_get_prefix();
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => 10,
	'meta_key' => $prefix . 'testimonial',
	'meta_value' => 0,
	'meta_compare' => '!='
	);
$loop = new WP_Query( $args );

if ( $loop->have_posts() ) :
	?>
<section class="padding-large top bottom">
	<header class="section-header">
		<h2 class="<?php echo shandora_is_home() ? 'home-section-header' : 'services-header'; ?>"><?php _e( 'Our clients rock', 'bon' ); ?></h2>
		<?php if ( !shandora_is_home() ) echo '<hr />'; ?>
	</header>
	<?php open_testimonials_slider_container(); ?>
	<?php open_testimonials_slider( $loop ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<?php render_single_testimonial( $post ); ?>
<?php endwhile; ?>
<?php close_testimonials_slider(); ?>
<?php get_slider_thumbnails( $loop ); ?>
<?php close_testimonials_slider_container(); ?>
</section>
<?php
endif;
wp_reset_query();
