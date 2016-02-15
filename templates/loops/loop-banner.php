<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

$loop = new WP_Query(
	array(
		'post_type'			=> 'banner',
		'posts_per_page'	=> -1,
		'post_status'		=> 'publish',
		'orderby'			=> 'menu_order',
		'order'				=> 'ASC'
		)
	);
	?>

	<?php if ( $loop->have_posts() ) { ?>	

	<section id="banners-slider" class="padding-large top hide-for-small">
		<div class="slider-container thumbs-inside">
			<ul class="slides bxslider-thumbs-only autostart" data-pause="8000" data-pager="banners-pager">

				<?php while ( $loop->have_posts() ) { $loop->the_post(); ?>

				<?php bon_get_template_part( 'block', 'banner' ); ?>

				<?php } ?>

			</ul>
			<div id="banners-pager" class="full-pager clearfix bxslider-pager">

				<?php while ( $loop->have_posts() ) { $loop->the_post(); ?>

				<a href="#" class="text-center" data-slide-index="<?php echo $loop->current_post; ?>"><?php echo $loop->current_post + 1; ?></a>

				<?php } ?>

			</div>
		</div>
	</section>

	<?php }
	wp_reset_postdata();
	?>