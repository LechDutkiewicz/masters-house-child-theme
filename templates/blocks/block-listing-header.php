<?php
$size = ( isset( $_GET['view'] ) && $_GET['view'] == 'list' ) ? 'listing_list' : 'listing_small';
?>
<header class="entry-header badge-container">

	<?php the_badge(); ?>

	<?php
	$_overlay_btns = bon_get_option( 'overlay_buttons', array( 'link' => true, 'gallery' => true, 'compare' => true ) );

	$link_btn = $_overlay_btns['link'] == true ? true : false;
	$gallery_btn = $_overlay_btns['gallery'] == true ? true : false;
	$compare_btn = $_overlay_btns['compare'] == true ? true : false;

	if ( ( bon_get_option( 'show_overlay', 'yes' ) == 'yes' ) && ( $link_btn || $gallery_btn || $compare_btn ) ) :
		?>
		<div class="listing-hover">
			<span class="mask"></span>
			<?php echo shandora_get_listing_hover_action( get_the_ID() ); ?>
		</div>
	<?php endif; ?>
	<?php
	if ( get_post_type() == 'listing' ) {

		$terms = get_the_terms( get_the_ID(), "property-type" );

		if ( $terms && !is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				?>
				<a class="property-type<?php echo ($size == 'listing_list') ? ' hide-for-small' : ''; ?>" href="<?php echo get_term_link( $term->slug, "property-type" ); ?>"><?php echo $term->name; ?></a>
				<?php
				break; // to display only one property type
			}
		}
	} else {
		$terms = get_the_terms( get_the_ID(), "body-type" );

		if ( $terms && !is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				echo '<a class="body-type property-type" href="' . get_term_link( $term->slug, "body-type" ) . '">' . $term->name . '</a>';
				break; // to display only one property type
			}
		}
	}
	?>	
		<?php if ( current_theme_supports( 'get-the-image' ) ) { ?>
		<a class="header-link product-link" href="<?php the_permalink(); ?>" data-analytics-category="pick a cottage" data-analytics-action="click image link" data-analytics-selector="listing_image_link">
			<div class="overlay"></div>
			<?php
			if ( current_theme_supports( 'get-the-image' ) ) {
				if ( $_SESSION['layoutType'] === 'mobile' ) {
					$size = 'mobile_tall';
				} else {
					$size = 'listing_small';
				}
				$src = get_the_image( array( 'size' => $size, 'link_to_post' => false, 'image_class' => 'auto' ) );
			}
			?>
		</a>
	<?php } ?>

</header><!-- .entry-header -->