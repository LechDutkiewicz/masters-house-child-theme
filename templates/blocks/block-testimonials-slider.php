<?php
$prefix = bon_get_prefix();
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => 10,
	/*'meta_key' => $prefix . 'user_img',
	'meta_value' => 0,
	'meta_compare' => '!='*/
	);
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) :
	?>
<section>
	<header class="section-header">
		<h3 class="<?php echo shandora_is_home() ? 'home-section-header' : 'services-header'; ?>"><?php _e( 'Our clients rock', 'bon' ); ?></h3>
		<?php if ( !shandora_is_home() ) echo '<hr />'; ?>
	</header>
	<div class="row entry-row">
		<div class="padding-<?php echo shandora_is_home() ? 'large' : 'medium'; ?> clearfix">
			<div class="column large-12 testimonials-slider-container">
				<div id="testimonials-slider">



					<ul class="slides testimonial-slides bxslider-no-thumb-no-controls autostart">

						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li>
							<div class="testimonial-container">
								<div class="row">
									<?php if ( shandora_is_home() ) : ?>
									<div class="column large-2 blank"></div>
								<?php endif; ?>
								<div class="testimonial column large-<?php echo shandora_is_home() ? '8' : '12'; ?> text-center">
									<i class="bonicons bi-quote-left"></i><span><?php echo get_the_content(); ?></span><i class="bonicons bi-quote-right"></i>
								</div>	
								<?php if ( shandora_is_home() ) : ?>
								<div class="column large-2 blank"></div>
							<?php endif; ?>
						</div>
						<div class="row">			
							<?php if ( shandora_is_home() ) : ?>				
							<div class="column large-2 blank"></div>
						<?php endif; ?>
						<div class="testimonial-author column large-<?php echo shandora_is_home() ? '8' : '12'; ?> text-right">
							<span><?php echo get_the_title(); ?><?php if ( current_theme_supports( 'get-the-image' ) && $imgID = shandora_get_meta( $post->ID, 'user_img' ) ) get_the_image( array( 'post_id' => $imgID, 'size' => 'user_small', 'link_to_post' => false, 'image_class' => array( 'circle', 'auto' ) ) ); ?></span>
							<?php
							$link = shandora_get_meta( $post->ID, 'related_post' );
							if ( !empty( $link ) ) {
								?>
								<div class="testimonial-link">
									<a href="<?php echo get_permalink( $link ); ?>"><?php _e( 'Read full story', 'bon' ); ?></a>
								</div>
								<?php } ?>
							</div>
							<?php if ( shandora_is_home() ) : ?>
							<div class="column large-2 blank"></div>
						<?php endif; ?>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>

</div>
</div>
</div>
</div>
</section>
<?php
endif;
wp_reset_query();
