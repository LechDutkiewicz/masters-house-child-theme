<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Shandora listing excerpt
 * This block handles excerpt for products related to post
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://techsavvymarketers.pl
 * @since		Version 1.2
 * @package 	Layouts
 * @category 	Layout
 *
 *
 */

// setup vars
$related = shandora_get_meta( $post->ID, 'listing_related_cottage');

if ( $related ) {

	$args = array(
		'post_type' => 'listing',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post__in' => array($related),
		);

	$loop = new WP_Query( $args );

	if ( !empty( $loop->posts ) ) :
		?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<section class="entry-content clear listing-excerpt margin-large top">

		<header class="entry-header clear">
			<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h3 class="entry-title">', '</h3>', false ) ); ?>
		</header><!-- .entry-header -->

		<?php bon_get_template_part( 'block', 'listinggallery' ); ?>
		<div class="row">
			<div class="column large-8" itemprop="description">
				<?php the_content(); ?>
			</div>
			<div class="column large-4 top-cta">
				<?php bon_get_template_part( 'block', 'listing-price-excerpt' ); ?>
			</div>
		</div>
	</section>

<?php endwhile;
endif;
wp_reset_query();
}