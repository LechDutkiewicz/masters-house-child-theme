<?php

if ( $_SESSION['layoutType'] === 'mobile' ) {
	$size = 'mobile_regular';
} else {
	$size = 'listing_large';
}

$term_meta = wp_get_post_terms( $post->ID, 'category' );
$ex_class = $term_meta[0]->slug;
$post_taxonomies = get_terms( 'category', array( 'slug' => $ex_class ) );
$color = $post_taxonomies[0]->term_id;
$color = get_option( "taxonomy_$color" );
$color = $color['color'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('listing format-video'); ?>>

	<?php if ( is_singular( get_post_type() ) && !defined('RELATED_POSTS') ) { ?>

	<header class="entry-header <?php echo $color; ?>">
		<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h1 class="entry-title">', '</h1>', false ) ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content clear">

		<?php bon_get_template_part( 'block', 'listinggallery' ); ?>

		<div class="padding-large bottom">
			<?php if ( get_the_content() ) the_content(); ?>
		</div>

		<?php //display client's testimonial if there is one ?>
		<?php if ( shandora_get_meta( $post->ID, 'testimonial' ) != "" ) { shandora_get_testimonial( $loop, $post ); } ?>

		<?php bon_get_template_part( 'block', 'listing-excerpt' ); ?>

		<?php do_atomic( "after_single_post_content" ); ?>

		<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'bon' ) . '</span>', 'after' => '</p>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo apply_atomic_shortcode( 'entry_tag', '<div class="entry-tag">' . __( '[entry-terms text="' . __( 'Tagged in:', 'bon' ) . '"]', 'bon' ) . '</div>' ); ?>
	</footer><!-- .entry-footer -->

	<?php } else { ?>

	<header class="entry-header <?php echo $color; ?>">								
		<?php if ( current_theme_supports( 'get-the-image' ) ) { ?>
		<div class="featured-image">
			<a class="header-link" href="<?php the_permalink(); ?>">
				<div class="overlay"></div>
				<?php get_the_image( array( 'size' => $size, 'link_to_post' => false ) ); ?>
			</a>
		</div>
		<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h3 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( array( 'before' => 'Permalink to: ', 'echo' => false ) ) . '">', '</a></h3>', false ) ); ?>
		<?php echo apply_atomic_shortcode( 'entry_byline', '<div class="entry-byline">' . __( '[entry-icon class="show-for-large-up"] [entry-published format="M, d Y" text="' . __( 'Posted on ', 'bon' ) . '"] [entry-comments-link] [entry-terms limit="1" exclude_child="true" taxonomy="category"] [entry-edit-link]', 'bon' ) . '</div>' ); ?>
		<?php the_excerpt(); ?>
		<a class="flat button <?php echo $color; ?> radius" href="<?php the_permalink(); ?>" data-analytics-category="testimonials page" data-analytics-action="click read more from single page" data-analytics-selector="read_more_single"><?php _e( 'Read more', 'bon' ); ?></a>
		<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'bon' ) . '</span>', 'after' => '</p>' ) ); ?>
	</div><!-- .entry-summary -->


	<?php } ?>

</article><!-- .hentry -->

<?php if ( is_singular( get_post_type() ) && !defined('RELATED_POSTS') ) {

	do_atomic( "after_single_post_entry" );

} ?>