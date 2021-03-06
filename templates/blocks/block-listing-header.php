<?php
$size = ( isset( $_GET['view'] ) && $_GET['view'] == 'list' ) ? 'listing_list' : 'listing_small';
?>
<header class="entry-header badge-container">

	<?php the_badge();

	if ( get_post_type() == 'listing' ) {

		$terms = get_the_terms( get_the_ID(), "property-type" );

		if ( $terms && !is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				?>
				<a class="property-type bg-<?php echo get_cat_color($post->ID); ?><?php echo ($size == 'listing_list') ? ' hide-for-small' : ''; ?>" href="<?php echo get_term_link( $term->slug, "property-type" ); ?>" <?php the_ga_event('Cottage List', 'Pick category', 'Grid item'); ?>><?php echo $term->name; ?></a>
				<?php
				break; // to display only one property type
			}
		}
	} else {
		$terms = get_the_terms( get_the_ID(), "body-type" );

		if ( $terms && !is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				echo '<a class="body-type property-type" href="' . get_term_link( $term->slug, "body-type" ) . '"' . get_ga_event('Cottage List', 'Pick category', 'Grid item') .'>' . $term->name . '</a>';
				break; // to display only one property type
			}
		}
	}
	?>	
	<?php if ( current_theme_supports( 'get-the-image' ) ) { ?>
	<a class="header-link product-link" href="<?php the_permalink(); ?>" <?php the_ga_event('Cottage List', 'Pick single cottage', 'Image'); ?>>
		<div class="overlay"></div>
		<?php
		if ( current_theme_supports( 'get-the-image' ) ) {
			if ( $_SESSION['layoutType'] === 'mobile' ) {
				$size = 'mobile_tall';
			} else {
					// $size = 'listing_small';
				$size = 'mobile_tall';
			}
			get_the_image( array( 'size' => $size, 'link_to_post' => false, 'image_class' => 'auto' ) );
		}
		?>
	</a>
	<?php } ?>

</header><!-- .entry-header -->