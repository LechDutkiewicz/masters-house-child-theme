<?php

global $post;
$related_query = shandora_get_related_query( $post->ID );

if ( $related_query ) :
	$compare_page = bon_get_option( 'compare_page' );
?>
<section class="padding-large top bottom">
	<header>		
		<h2><?php _e( 'You may also like', 'bon' ); ?></h2>
		<hr />
	</header>
	<ul class="listings related small-custom-grid-1" data-compareurl="<?php echo get_permalink( $compare_page ); ?>">

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
