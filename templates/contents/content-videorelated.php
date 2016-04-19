<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header <?php echo shandora_get_content_color(); ?>">
		<div class="entry-video"><?php echo bon_media_grabber(); ?></div>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h4 class="entry-title"><a href="'.get_permalink().'" title="'.the_title_attribute( array('before' => 'Permalink to: ', 'echo' => false) ).'">', '</a></h4>', false ) ); ?>
	</div><!-- .entry-summary -->

</article><!-- .hentry -->