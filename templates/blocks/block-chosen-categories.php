<?php
$id = 'featured-listing';
if ( $_SESSION['layoutType'] === 'mobile' ) {
	$args = array( 'per_slide' => 1, 'limit' => 5 );
} else {
	$args = array( 'per_slide' => 4, 'limit' => 20 );
}
$ctaArgs = array(
	'button_icon' => bon_get_option( 'listing_cta_icon', 'yes' ),
	'title' => bon_get_option( 'listing_cta_title', 'yes' ),
	'subtitle' => bon_get_option( 'listing_cta_subtitle', 'yes' ),
	'button_link' => bon_get_option( 'listing_cta_link', 'yes' ),
	'button_text' => bon_get_option( 'listing_cta_anchor', 'yes' )
	);
	?>
	<section class="padding-large top">
		<header class="section-header">
			<h2 class="home-section-header"><?php _e( 'Our ready projects', 'bon' ); ?></h2>
		</header>
		<div class="row entry-row">
			<div class="column large-12 featured-listing-carousel">
				<?php

				$cats = bon_get_option( 'cats_home' );

				if ( isset($cats) && !empty($cats) ) { ?>				
				<ul class="listings small-block-grid-1 medium-block-grid-2 large-block-grid-4">
					<?php
					foreach ($cats as $cat) {

            // get term object for each category
						$term = get_term($cat['cat_name'], 'property-type');
						$id = $term->term_id;
            // get color for each category
						$color = get_option( "taxonomy_$id" );

						$prefix = bon_get_prefix();
						$query = array(
							'post_type' => 'listing',
							'posts_per_page' => 1,
							'tax_query' => array(
								array(
									'taxonomy' => 'property-type',
									'terms' => $id
									),
								),
							'meta_key' => bon_get_prefix() . 'listing_price',
							'orderby' => 'meta_value_num',
							'order' => 'DSC'
							);
						$loop = new WP_Query( $query );

						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) { $loop->the_post();
								include ( locate_template("templates/contents/content-category.php") );
							}
						} else {
							echo '<p>' . __( 'No property listing were found', 'bon' ) . '</p>';
						}
						wp_reset_query();
					}
					?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</section>

