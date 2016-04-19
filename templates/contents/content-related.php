<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header <?php echo shandora_get_content_color(); ?>">								
		<?php if ( current_theme_supports( 'get-the-image' ) ) { ?>
		<div class="featured-image">
			<a class="header-link" href="<?php the_permalink(); ?>">
				<div class="overlay"></div>
				<?php get_the_image( array( 'size' => 'mobile_regular', 'link_to_post' => false ) ); ?>
			</a>
		</div>
		<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h4 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( array( 'before' => 'Permalink to: ', 'echo' => false ) ) . '">', '</a></h4>', false ) ); ?>
	</div><!-- .entry-summary -->

</article><!-- .hentry -->