<?php
$current_post = $post->ID;

// edited by Lech Dutkiewicz

/* $locs = wp_get_object_terms( $current_post, 'property-location' );
$feats = wp_get_object_terms( $current_post, 'property-feature' ); */
$types = wp_get_object_terms( $current_post, 'property-type' );

$price = shandora_get_meta( $current_post, 'listing_price' );
$size = shandora_get_meta( $current_post, 'listing_lotsize' );
$price_min = $price - ( $price * 20 / 100 );
$price_max = $price + ( $price * 20 / 100 );
$size_min = $size - ( $size * 20 / 100 );
$size_max = $size + ( $size * 20 / 100 );

$loc_query = array();
$type_query = array();
$feat_query = array();
$tax_query = array();

/* if( $locs ) {
  foreach($locs as $loc) {
  $loc_query[] = $loc->slug;
  }

  $tax_query[] = array(
  'taxonomy' => 'property-location',
  'field' => 'slug',
  'terms' => $loc_query,
  );
} */

/* if( $feats ) {
  foreach( $feats as $feat ) {
  $feat_query[] = $feat->slug;
  }
  $tax_query[] = array(
  'taxonomy' => 'property-feature',
  'field' => 'slug',
  'terms' => $feat_query,
  );
} */

if ( $types ) {
	foreach ( $types as $type ) {
		$type_query[] = $type->slug;
	}
	$tax_query[] = array(
		'taxonomy' => 'property-type',
		'field' => 'slug',
		'terms' => $type_query,
		);
}

if ( $tax_query && count( $tax_query ) > 1 ) {
	$tax_query['relation'] = 'OR';
}

$posts_per_page = 3;
$layout = get_theme_mod( 'theme_layout' );
if ( empty( $layout ) ) {
	$layout = get_post_layout( get_queried_object_id() );
	if ( $layout == '1c' ) {
		$posts_per_page = 4;
	}
}

$args = array(
	'posts_per_page' => $posts_per_page,
	'post_type' => 'listing',
	'post_status' => 'publish',
	'post__not_in' => (array) $current_post,
	'tax_query' => $tax_query,
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key' => bon_get_prefix() . 'listing_price',
			'compare' => 'BETWEEN',
			'value' => array( $price_min, $price_max ),
			'type' => 'NUMERIC',
			),
		array(
			'key' => bon_get_prefix() . 'listing_lotsize',
			'compare' => 'BETWEEN',
			'value' => array( $size_min, $size_max ),
			'type' => 'NUMERIC',
			)
		)
	);

if ( $_SESSION['layoutType'] === 'mobile' ) {
	$size = 'mobile_tall';
} else {
	$size = 'listing_small';
}

$related_query = get_posts( $args );

if ( $related_query ) :
	$compare_page = bon_get_option( 'compare_page' );
?>
<section class="padding-large top bottom">
	<header>		
		<h2><?php _e( 'You may also like', 'bon' ); ?></h2>
		<hr />
	</header>
	<ul class="listings related <?php shandora_block_grid_column_class(); ?>" data-compareurl="<?php echo get_permalink( $compare_page ); ?>">

		<?php
		foreach ( $related_query as $post ) :

			$status = shandora_get_meta( $post->ID, 'listing_status' );
		$bed = shandora_get_meta( $post->ID, 'listing_bed' );
		$bath = shandora_get_meta( $post->ID, 'listing_bath' );
		$lotsize = shandora_get_meta( $post->ID, 'listing_buildingsize' );
		$sizemeasurement = bon_get_option( 'measurement' );

// loop for custom colors for product's types	
		?>

		<li class="<?php echo extra_class($post->ID); ?>">
			<article id="post-<?php the_ID(); ?>" <?php post_class( array( get_cat_color($post->ID), 'hover-shadow' ) ); ?> itemscope itemtype="http://schema.org/Product">

				<?php

				bon_get_template_part( 'block', 'listing-header' );

				?>

				<div class="entry-summary">

					<?php do_atomic( 'entry_summary' ); ?>

				</div><!-- .entry-summary -->

				<?php

				bon_get_template_part( 'block', 'listing-footer' );

				?>

			</article>
		</li>

		<?php
		endforeach;
		?>
	</ul>
</section>
<?php
endif;
wp_reset_query();
