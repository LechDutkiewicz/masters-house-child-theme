<?php

if ( is_singular( get_post_type() ) ) {
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Product">

		<?php do_atomic( 'before_single_entry_content' ); ?>

		<section class="entry-content clear">
			<div class="row">
				<div class="column medium-8" itemprop="description">
					<?php the_content(); ?>
				</div>
				<div class="column medium-4 top-cta">
					<?php bon_get_template_part( 'block', 'block-price' ); ?>
				</div>
				<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'bon' ) . '</span>', 'after' => '</p>' ) ); ?>
			</div>
		</section><!-- .entry-content -->

		<?php do_atomic( 'after_single_entry_content' ); ?>

	</article>
	<?php
} else {

	$view = isset( $_GET['view'] ) ? $_GET['view'] : 'grid';
	?>
	<li>
		<article id="post-<?php the_ID(); ?>" <?php post_class( array( get_cat_color($post->ID), 'hover-shadow' ) ); ?> itemscope itemtype="http://schema.org/Product">

			<?php
			if ( $view == 'list' ) {
				echo '<div class="row"><div class="column large-3 small-4">';
			}

			bon_get_template_part( 'block', 'listing-header' );

			if ( $view == 'list' ) {
				echo '</div>';
				echo '<div class="column large-9 small-8">';
			}
			?>

			<div class="entry-summary">

				<?php do_atomic( 'entry_summary' ); ?>

			</div><!-- .entry-summary -->

			<?php
			if ( $view == 'list' ) {

				echo '</div></div>';
			}
			?>

			<?php
			if ( $view == 'grid' ) {
				bon_get_template_part( 'block', 'listing-footer' );
			}
			?>

		</article>
	</li>

<?php } ?>