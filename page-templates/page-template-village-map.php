<?php
/*
 * Template Name: Products Gallery
 */

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Shandora products gallery page layout
 * This page handles layout for page with map of already built cottages
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://techsavvymarketers.pl
 * @since		Version 1.0
 * @category 	Page layouts
 *
 *
 */

get_header();
?>
<div id="inner-wrap" class="<?php echo shandora_is_home() ? 'home ' : ''; ?>slide">

	<div id="body-container" class="container">

		<?php
		/**
		 * Shandora Before Loop Hook
		 *
		 * @hooked shandora_get_page_header - 1
		 * @hooked shandora_open_main_content_row - 5
		 * @hooked shandora_open_main_content_column - 15
		 * @hooked shandora_get_right_sidebar - 10
		 *
		 */

		do_atomic( 'before_loop' );
		?>
		
		<?php bon_get_template_part( 'block', 'village-map' ); ?>

		<?php wp_reset_query(); ?>
		<?php
		/**
		 * Shandora After Loop Hook
		 *
		 * @hooked shandora_close_main_content_column - 1
		 * @hooked shandora_get_right_sidebar - 5
		 * @hooked shandora_close_main_content_row - 10
		 *
		 */
		do_atomic( 'after_loop' );
		?>

	</div>


	<?php get_footer(); ?>
