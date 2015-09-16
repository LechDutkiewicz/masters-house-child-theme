<footer class="entry-footer">
	<div class="property-price">
		<a href="<?php the_permalink(); ?>" class="product-link" title="<?php the_title_attribute( array('before' => __('Permalink to ','bon') ) ); ?>" <?php the_ga_event('Cottage List', 'Pick single cottage', 'Image'); ?>><?php shandora_get_listing_price(); ?></a>
	</div>
</footer><!-- .entry-footer -->