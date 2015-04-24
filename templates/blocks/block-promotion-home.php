<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Shandora layout block
 * This block handles promotions displayed on the home page
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://techsavvymarketers.pl
 * @since		Version 1.1
 * @package 	Layouts
 * @category 	Layout
 *
 *
 */

$args = array(
	'post_type' => 'promotions',
	'posts_per_page' => 1,
	'orderby' => 'menu_order'
);

$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();
	?>

<section>
	<header class="section-header">
		<h3 class="home-section-header"><?php the_title(); ?></h3>
	</header>
	<div class="row entry-row">
		<div class="column large-12">
			<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'size' => 'full', 'image_class' => 'auto' ) ); ?>
			<a href="<?php the_permalink(); ?>" class="flat button main radius cta button-absolute bottom right hide-for-small"><?php _e( 'Read more', 'bon' ); ?></a>
		</div>
	</div>
</section>

	<?php
endwhile;
wp_reset_query();

?>