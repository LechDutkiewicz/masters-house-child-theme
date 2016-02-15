<?php
//Changed by Lech Dutkiewicz

// setup vars for addons type posts
// addons are items included in price, they appear as the first tap

$addons = 'cottage';

if ( shandora_get_meta( get_the_ID(), 'listing_enable_packages' ) ) {
	$addons = 'big';
} else if ( shandora_get_meta( get_the_ID(), 'listing_enable_construction' ) ) {
	$addons = 'construction';
}

$addons_loop_args = array(
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

// setup vars for other tabs

$price = shandora_get_meta( $post->ID, 'listing_price', true );
//$monprice = shandora_get_meta( $post->ID, 'listing_monprice' );
$lotsize = shandora_get_meta( $post->ID, 'listing_lotsize' );
$terracesqmt = shandora_get_meta( $post->ID, 'listing_terracesqmt' );
$rooms = shandora_get_meta( $post->ID, 'listing_rooms' );
$floors = shandora_get_meta( $post->ID, 'listing_floors' );

$dimensions = get_post_meta( $post->ID, bon_get_prefix() . 'listing_plandimensions' );
$dimensions = shandora_get_dimensions($dimensions, $lotsize);

$height = shandora_get_meta( $post->ID, 'listing_height' );
$wallheight = shandora_get_meta( $post->ID, 'listing_wallheight' );
$wallthickness = shandora_get_meta( $post->ID, 'listing_wallthickness' );
$floorthickness = shandora_get_meta( $post->ID, 'listing_floorthickness' );
$roofthickness = shandora_get_meta( $post->ID, 'listing_roofthickness' );
//$windows = shandora_get_meta( $post->ID, 'listing_windows' );
//$windowssizes = shandora_get_meta( $post->ID, 'listing_windowssizes' );
$windowssizes = get_post_meta( $post->ID, bon_get_prefix() . 'listing_windowssizes' );
$windowssizes = shandora_get_windows( $windowssizes );
//$doors = shandora_get_meta( $post->ID, 'listing_doors' );
//$doorssizes = shandora_get_meta( $post->ID, 'listing_doorssizes' );
$doorssizes = get_post_meta( $post->ID, bon_get_prefix() . 'listing_doorssizes' );
$doorssizes = shandora_get_doors( $doorssizes );

// Added by Maduranga.
foreach(get_the_terms($post->ID,"property-type") as $term) { 
	$termid = $term->term_id; 
	$propertytype = $term->name;
}

// fetch additional parameters if cottage has construction layout
if ( shandora_get_meta( $post->ID, 'listing_enable_construction' ) ) {

	$roofsize = shandora_get_meta( $post->ID, 'listing_constructionroofsize' );
	$columnssizes = get_post_meta( $post->ID, bon_get_prefix() . 'listing_columnssizes' );
	$columnssizes = shandora_get_columns( $columnssizes );
	//var_dump($columnssizes);
	$rafterssizes = get_post_meta( $post->ID, bon_get_prefix() . 'listing_rafterssizes' );
	$rafterssizes = shandora_get_rafters( $rafterssizes );

}

$currency = bon_get_option( 'currency' );
$sizemeasurement = bon_get_option( 'measurement' );
$heightmeasurement = bon_get_option( 'height_measure' );

$status_opt = shandora_get_search_option( 'status' );

if ( isset( $status ) && array_key_exists( $status, $status_opt ) ) {
	$status = $status_opt[$status];
}

// Changed by Maduranga.	
if($termid == "31" || $termid == "256" || $termid == "34" || $termid == "35") {
	$details = apply_atomic( 'property_details_tab_content', array(
		'price' => __( 'Price:', 'bon' ),
		'monprice' => __( 'Monthly price:', 'bon' ),
		'lotsize' => __( 'Size:', 'bon' ),
		'terracesqmt' => __( 'Terrace size:', 'bon' ),
		'rooms' => __( 'Rooms:', 'bon' ),
		'floors' => __( 'Floors:', 'bon' ),
		'dimensions' => __( 'Dimensions:', 'bon' ),
		'height' => __( 'Height:', 'bon' ),
		'wallheight' => __( 'Wall height:', 'bon' ),
		'wallthickness' => __( 'Wall thickness:', 'bon' ),
		'floorthickness' => __( 'Floor thickness:', 'bon' ),
		'roofthickness' => __( 'Roof thickness:', 'bon' ),
		'windows' => __( 'Windows:', 'bon' ),
		'windowssizes' => __( 'Windows sizes:', 'bon' ),
		'doors' => __( 'Doors:', 'bon' ),
		'doorssizes' => __( 'Doors sizes:', 'bon' ),
		'roofsize' => __( 'Roof size', 'bon' ) . ':',
		'columnssizes' => __( 'Columns size', 'bon' ) . ':',
		'rafterssizes' => __( 'Rafters size', 'bon' ) . ':',
		) );
} else {
	$details = apply_atomic( 'property_details_tab_content', array(
		'price' => __( 'Price:', 'bon' ),
		'monprice' => __( 'Monthly price:', 'bon' ),
		'lotsize' => __( 'Size:', 'bon' ),
		'terracesqmt' => __( 'Terrace size:', 'bon' ),
		'rooms' => __( 'Rooms:', 'bon' ),
		'floors' => __( 'Floors:', 'bon' ),
		'dimensions' => __( 'Dimensions:', 'bon' ),
		'height' => __( 'Height:', 'bon' ),
		'wallheight' => __( 'Wall height:', 'bon' ),
		'wallthickness' => __( 'Wall thickness:', 'bon' ),
		'floorthickness' => __( 'Floor thickness:', 'bon' ),
		'roofthickness' => __( 'Roof thickness:', 'bon' ),
		'windows' => __( 'Windows:', 'bon' ),
		'windowssizes' => __( 'Windows sizes:', 'bon' ),
		'doors' => __( 'Doors:', 'bon' ),
		'doorssizes' => __( 'Doors sizes:', 'bon' ),
		'roofsize' => __( 'Roof size', 'bon' ) . ':',
		'columnssizes' => __( 'Columns size', 'bon' ) . ':',
		'rafterssizes' => __( 'Rafters size', 'bon' ) . ':',
		) );
}

// $specs = apply_atomic( 'property_specifications_tab_content', array(
// 	'dimensions' => __( 'Dimensions:', 'bon' ),
// 	'height' => __( 'Height:', 'bon' ),
// 	'wallheight' => __( 'Wall height:', 'bon' ),
// 	'wallthickness' => __( 'Wall thickness:', 'bon' ),
// 	'floorthickness' => __( 'Floor thickness:', 'bon' ),
// 	'roofthickness' => __( 'Roof thickness:', 'bon' ),
// 	'windows' => __( 'Windows:', 'bon' ),
// 	'windowssizes' => __( 'Windows sizes:', 'bon' ),
// 	'doors' => __( 'Doors:', 'bon' ),
// 	'doorssizes' => __( 'Doors sizes:', 'bon' ),
// 	'roofsize' => __( 'Roof size', 'bon' ) . ':',
// 	'columnssizes' => __( 'Columns size', 'bon' ) . ':',
// 	'rafterssizes' => __( 'Rafters size', 'bon' ) . ':',
// 	)
// );
?>
<section>
	<nav class="tab-nav">

		<?php if ( !empty( $addons_loop_args ) && is_array( $addons_loop_args ) ) { ?> 

		<a class="active" href="#tab-target-addons"><?php _e( 'Price includes', 'bon' ); ?></a>

		<?php } ?>

		<?php if ( !empty( $details ) && is_array( $details ) ) { ?> 

		<a href="#tab-target-details"><?php _e( 'Details', 'bon' ); ?></a>

		<?php } ?>

		<?php if ( !empty( $specs ) && is_array( $specs ) ) { ?>

		<a href="#tab-target-spec"><?php _e( 'Specifications', 'bon' ); ?></a>

		<?php } ?>

		<?php if ( $_SESSION['layoutType'] !== 'mobile' ) { ?>

		<a class="<?php
		if ( empty( $details ) || !is_array( $details ) ) {
			echo 'active';
		}
		?>" href="#tab-target-features"><?php _e( 'Additional services', 'bon' ); ?></a>

		<?php } ?>

	</nav>
	<div class="tab-contents">

		<?php if ( !empty( $addons_loop_args ) && is_array( $addons_loop_args ) ) { ?> 
		<div id="tab-target-addons" class="tab-content active border-main">
			<?php 
			// setup new loop
			$loop = new WP_Query( $addons_loop_args );
			$posts = $loop->post_count;
			$posts_per_column = ceil( $posts / 2 );

			if ( !empty( $loop->posts ) ) {
				?>
				<div class="row">
					<div class="column small-12 medium-6">
						<ul>
							<?php while ( $loop->have_posts() ) { $loop->the_post(); ?>
							<li><?php the_title(); ?></li>
							<?php if ( !( $loop->current_post + 1 >= $posts ) && (( $loop->current_post + 1) % $posts_per_column === 0 ) ) { ?>
						</ul>
					</div>
					<div class="column small-12 medium-6">
						<ul>
							<?php
						}
					}
					?>
				</ul>
			</div>
		</div>
		<?php }
		wp_reset_query();
		?>
	</div>

	<?php } ?>

	<?php if ( !empty( $details ) && is_array( $details ) ) { ?> 
	<div id="tab-target-details" class="tab-content border-main">

		<ul class="property-details">
			<?php foreach ( $details as $key => $value ) { ?>
			<?php if ( !empty( $$key ) ) { ?> 
			<li>
				<strong><?php echo $value; ?> </strong>

				<?php
						// display other layout if meta is price
				if ( $key === 'price' ) {

					shandora_get_listing_price();

				} else {

						// display regular layout for all other meta values
					?>

					<span>
						<?php
						echo $$key;

						if ( $key === 'lotsize' || $key === 'terracesqmt' ) {

							echo ' ' . $sizemeasurement;

						} else if ( $key === 'price' || $key === 'monprice' ) {

							echo ' ' . $currency;

						} else if ( $key === 'height' || $key === 'wallheight' || $key === 'wallthickness' || $key === 'floorthickness' || $key === 'roofthickness' ) {

							echo ' ' . $heightmeasurement;

						} else if ( $key === 'roofsize' ) {

							echo ' ' . $sizemeasurement;
							
						}

						?>
					</span>

					<?php } ?>

				</li>
				<?php } ?>
				<?php }	?>
			</ul>

		</div>

		<?php } ?>

		<?php if ( !empty( $specs ) && is_array( $specs ) ) { ?> 

		<div id="tab-target-spec" class="tab-content border-main">
			<ul class="property-spec">

				<?php foreach ( $specs as $key => $value ) { ?>

				<?php if ( !empty( $$key ) ) { ?> 

				<li>
					<strong><?php echo $value; ?> </strong>
					<span>
						<?php
						echo $$key;
						if ( $key === 'height' || $key === 'wallheight' || $key === 'wallthickness' || $key === 'floorthickness' || $key === 'roofthickness' ) {
							echo ' ' . $heightmeasurement;
						} else if ( $key === 'roofsize' ) {
							echo ' ' . $sizemeasurement;
						}
						?>
					</span>
				</li>

				<?php } ?>

				<?php }	?>

			</ul>
		</div>

		<?php } ?>

		<?php if ( $_SESSION['layoutType'] !== 'mobile' ) { ?>

		<div id="tab-target-features" class="tab-content border-main">

			<ul class="bon-toolkit-accordion" id="accordion-services">
				<?php
				bon_get_template_part( 'block', trailingslashit( get_post_type() ) . 'additional-services' );
				?>
			</ul>

		</div>

		<?php } ?>

	</div>
</section>