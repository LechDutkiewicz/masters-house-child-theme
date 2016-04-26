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

if ( $loop->have_posts() ) { ?>

<section class="padding-large top<?php echo $_SESSION['layoutType'] !== 'mobile' ? ' bottom' : ''; ?> show-for-medium-up">
	<header class="section-header">
		<h2 class="<?php echo shandora_is_home() ? 'home-section-header' : 'services-header'; ?>"><?php _e( 'Our clients rock', 'bon' ); ?></h2>
		<?php if ( !shandora_is_home() ) echo '<hr />'; ?>
	</header>

	<div class="row padding-large top bottom clearfix">
		<div class="column large-12 testimonials-slider-container">
			<div id="testimonials-slider">
				<ul class="slides testimonial-slides <?php if ( $loop->post_count > 1 ) { echo $_SESSION['layoutType'] !== 'mobile' ? 'bxslider-thumbs-only autostart' : 'bxslider-no-thumb-no-controls autostart'; } ?>"<?php if ( $loop->post_count > 1 ) { echo ' data-pause="8000" data-pager="testimonials-pager"'; } ?>>

					<?php while ( $loop->have_posts() ) { $loop->the_post(); ?>

					<li>
						<div class="testimonial-container">
							<div class="row">
								<?php if ( shandora_is_home() ) { ?>
								<div class="column large-2 blank"></div>
								<?php } ?>
								<div class="testimonial column large-<?php echo shandora_is_home() ? '8' : '12'; ?><?php echo $_SESSION['layoutType'] !== 'mobile' ? ' text-center' : ''; ?>">
									<i class="bonicons bi-quote-left"></i><span><?php echo shandora_get_meta( $post->ID, 'testimonial' ); ?></span><i class="bonicons bi-quote-right"></i>
								</div>	
								<?php if ( shandora_is_home() ) { ?>
								<div class="column large-2 blank"></div>
								<?php } ?>
							</div>
							<div class="row">			
								<?php if ( shandora_is_home() ) { ?>				
								<div class="column large-2 blank"></div>
								<?php } ?>
								<div class="testimonial-author column large-<?php echo shandora_is_home() ? '8' : '12'; ?> text-right<?php if ( current_theme_supports( 'get-the-image' ) && $imgID = shandora_get_meta( $post->ID, 'user_img' ) ) echo ' has-img'; ?>">
									<span><?php echo shandora_get_meta( $post->ID, 'full_name' ); ?><?php if ( current_theme_supports( 'get-the-image' ) && $imgID = shandora_get_meta( $post->ID, 'user_img' ) ) get_the_image( array( 'post_id' => $imgID, 'size' => 'user_small', 'link_to_post' => false, 'image_class' => array( 'circle', 'auto' ) ) ); ?></span>
									<?php if ( $post->post_content != "" && !is_singular( 'testimonial' ) ) { ?>
									<div class="testimonial-link">
										<a href="<?php echo get_permalink(); ?>"><?php _e( 'Read full story', 'bon' ); ?></a>
									</div>
									<?php } ?>
								</div>
								<?php if ( shandora_is_home() ) { ?>
								<div class="column large-2 blank"></div>
								<?php } ?>
							</div>
						</div>
					</li>

					<?php } ?>

				</ul>

				<?php if ( $_SESSION['layoutType'] !== 'mobile' ) { ?>

				<div id="testimonials-pager" class="bxslider-pager">
					<?php while ( $loop->have_posts() ) { $loop->the_post(); ?>
					<a href="#" data-slide-index="<?php echo $loop->current_post; ?>"><?php echo $loop->current_post + 1; ?></a>
					<?php } ?>
				</div>

				<?php } ?>

			</div>
		</div>
	</div>
</section>
<?php }
wp_reset_query();
