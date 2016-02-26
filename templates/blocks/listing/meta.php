<?php
if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Blocks for single product meta icons
 *
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://techsavvymarketers.pl
 * @since		Version 1.0
 * @package 	BonFramework
 * @category 	Theme blocks
 *
 *
 */

// setup vars
$post_meta_icons = get_related_meta_items();
?>

<ul class="mobile-custom-grid-2 xsmall-custom-grid-3 small-custom-grid-6" data-match-height>

	<?php foreach ( $post_meta_icons as $meta_icon ) {
		// check if additional content to display in modal exists and if current meta's dependency meta is set
		$has_modal = ( bon_get_option( sanitize_title( $meta_icon['name'] ) . '_desc' ) && ( !isset($meta_icon['dependency']) || shandora_get_meta( $post->ID, $meta_icon['dependency'] ) !== "" ) ) ? true : false;
		?>

		<li>
			<div class="meta-wrap bg-gradient-<?php echo $meta_icon['color']; ?><?php echo $has_modal ? ' has-descr' : ''; ?>" data-height-watch>
				<figure>
					<img src="<?php echo trailingslashit( BON_THEME_URI ); ?>assets/images/meta-icons/<?php echo sanitize_title( $meta_icon['name'] ); ?>.png" class="meta-img" alt="<?php _e( "Icon", "bon" ); ?>" width="80" height="80">
					<figcaption>
						<span class="meta-value">
							<?php echo render_meta_value( $meta_icon ); ?>
						</span>				
						<?php if ( $has_modal ) { ?>
						<div class="button-container">
							<a href="#" class="button small midnight-blue flat radius" data-reveal-id="meta-modal-<?php echo sanitize_title( $meta_icon['name'] ); ?>"><?php _e( "Read more", "bon" ); ?></a>
						</div>
						<?php } ?>
					</figcaption>
				</figure>
			</div>
		</li>

		<?php } ?>

	</ul>

	<?php foreach ( $post_meta_icons as $meta_icon ) {
// get content to display in modal window
		$reveal_content = bon_get_option( sanitize_title( $meta_icon['name'] ) . '_desc' );

// check if additional content to display in modal exists and if current meta's dependency meta is set
		if ( $reveal_content && ( !isset($meta_icon['dependency']) || shandora_get_meta( $post->ID, $meta_icon['dependency'] ) !== "" ) ) { ?>

		<div id="meta-modal-<?php echo sanitize_title( $meta_icon['name'] ); ?>" class="reveal-modal small">
			<div class="modal-header bg-<?php echo $meta_icon['color']; ?>">
				<span class="modal-title like-h4 text-white">
					<?php echo array_key_exists( 'name', $meta_icon ) ? bon_get_option( sanitize_title( $meta_icon['name'] ) . '_name' ) : null; ?>
				</span>
			</div>
			<div class="modal-body">
				<?php echo wpautop( $reveal_content ); ?>
			</div>
			<a class="close-reveal-modal">&#215;</a>
		</div>

		<?php } ?>

		<?php } ?>