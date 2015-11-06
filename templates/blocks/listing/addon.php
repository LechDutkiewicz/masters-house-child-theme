<?php

$addons = 'cottage';

if ( shandora_get_meta( get_the_ID(), 'listing_enable_packages' ) ) {
	$addons = 'big';
} else if ( shandora_get_meta( get_the_ID(), 'listing_enable_construction' ) ) {
	$addons = 'construction';
}

$args = array(
	'post_type' => 'addon',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'shandora_enabled_' . $addons,
			'value' => true,
			'compare' => '==='
			),
		),
	'post__not_in' => shandora_get_excluded_addons(),
	);

$loop = new WP_Query( $args );
$posts = $loop->post_count;
$posts_per_column = ceil( $posts / 2 );

if ( !empty( $loop->posts ) ) {
	?>

	<div class="column large-12">
		<hr>
		<h5 class="text main margin-medium top"><?php _e( 'Price includes', 'bon' ); ?></h5>
	</div>
	<div class="column small-12 large-6">
		<ul>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li>
				<?php the_title(); ?>
			</li>
			<?php if ( !( $loop->current_post + 1 >= $posts ) && (( $loop->current_post + 1) % $posts_per_column === 0 ) ) { ?>
		</ul>
	</div>
	<div class="column small-12 large-6">
		<ul>
			<?php
		}
		endwhile;
		?>
	</ul>
</div>
<?php }
wp_reset_query();
?>

