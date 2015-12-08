<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Start BonThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// BonFramework init
//require_once ( get_template_directory() . '/framework/bon.php' );


/*				
foreach ( $includes as $i ) {
	locate_template( $i, true );
}
*/

/* =============================
 * PUT YOUR FUNCTIONS HERE
 * =============================
 */

/**
 *
 * Here is an example to completely remove parent style
 * Uncomment the functions below to look what happen
 */

/*
function my_child_theme_remove_parent_styles() {
	remove_theme_support( 'dynamic-style' );
}

add_action( 'init', 'my_child_theme_remove_parent_style' );
*/

// OR using filter to remove style from parent
/*
function my_child_theme_remove_single_parent_style($parent_styles) {

	//this remove flexslider.css from parent
	unset($parent_styles['flexslider']);

	echo "<pre>", print_r($parent_styles), "</pre>";

}
add_filter('shandora_dynamic_style', 'my_child_theme_remove_single_parent_style', 1, 1 );
*/
/* Reload your page and WHOAAA!! superr!!! :) */

function shandora_print_phone_call_tracking_code() {

	if ( WP_ENV === 'production' && !is_user_logged_in() ) {

		$scripts = bon_get_option('google_adwords');

		if(!empty($scripts)) { ?>

		<!-- Google AdWords call tracking code -->
		<?php echo $scripts; ?>


		<?php 
	}

}

}

add_action('wp_head', 'shandora_print_phone_call_tracking_code', 103);

function shandora_get_main_header() {
	$header_style = bon_get_option( 'main_header_style', 'dark' );
	$state = bon_get_option( 'show_main_header', 'show' );
	$header_col_1 = bon_get_option( 'enable_header_col_1' );
	$header_col_2 = bon_get_option( 'enable_header_col_2' );
	$center_logo = bon_get_option( 'centering_logo' );

	$header_col_class = 'large-9';
	$col_class = 'large-6';
	$logo_class = 'uncentered';
	$logo_col_class = 'large-3';
	if ( $header_col_1 == true && $header_col_2 == true ) {
		$header_col_class = 'large-9 small-12';
		$col_class = 'large-6 small-12';
	} else if ( $header_col_1 == true && $header_col_2 == false ) {
		$header_col_class = 'large-5 small-12';
		$col_class = 'large-12';
	} else if ( $header_col_1 == false && $header_col_2 == true ) {
		$header_col_class = 'large-5 small-12';
		$col_class = 'large-12';
	} else {

		$logo_class = 'full';
		$logo_col_class = 'large-12';
		if ( $center_logo == true ) {
			$logo_class = 'centered';
		}
	}
	?>
	<hgroup id="main-header" class="<?php echo $header_style; ?> slide <?php echo $state; ?>">
		<div class="row">
			<?php $is_text = ((bon_get_option( 'logo' ) != '') ? false : true); ?>
			<div class="<?php echo $logo_col_class; ?> column small-centered large-<?php echo $logo_class; ?> <?php echo ($is_text) ? 'text-logo' : ''; ?>" id="logo">
				<div id="nav-toggle" class="navbar-handle show-for-small"></div>
				<?php
				$tag = 'h1';
				if ( is_singular() && !is_home() && !is_front_page() ) {
					$tag = 'h3';
				}
				?>
				<<?php echo $tag; ?> itemprop="name" class="<?php echo $logo_class; ?>"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php if ( bon_get_option( 'logo' ) ) { ?><img itemprop="image" src="<?php echo bon_get_option( 'logo', get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/><?php
			} else {
				echo esc_attr( get_bloginfo( 'name', 'display' ) );
			}
			?></a></<?php echo $tag; ?>>
			<?php if ( $is_text ) { ?>
			<span class="site-description <?php echo $logo_class; ?> hide-for-desktop hide-for-small"><?php echo get_bloginfo( 'description', 'display' ); ?></span>
			<?php } ?>
		</div>

		<?php if ( $header_col_1 == true || $header_col_2 == true ) : ?>
		<div class="<?php echo $header_col_class; ?> column" id="company-info">
			<div class="row">
				<?php if ( $header_col_1 ) : ?>
				<div class="<?php echo $col_class; ?> column text-center small-margin medium bottom">
					<div class="icon hide-for-small">
						<span class="sha-phone"></span>
					</div>
					<span class="info-title"><?php echo esc_attr( bon_get_option( 'hgroup1_title' ) ); ?></span>
					<?php
					$phone_html = '';
					$phone = explode( ',', esc_attr( bon_get_option( 'hgroup1_content' ) ) );
					$phone_count = count( $phone );
					if ( $phone_count > 1 ) {
						foreach ( $phone as $number ) {
							$phone_html .= '<strong>' . $number . '</strong>';
						}
					} else {
						$phone_html = '<strong>';

						// make phone tag a clickable link for mobile devices that will fire a Google Analytics event
						if ( $_SESSION['layoutType'] == 'mobile' ) {
							$phone_html .= '<a href="tel:' . esc_attr( bon_get_option( 'hgroup1_content' ) ) . '"' . get_ga_event( "Contact", "Call", "Menu Bar" ) . '>';
						}

						$phone_html .= "<span class='phone phone-$phone_count'>";
						$phone_html .= esc_attr( bon_get_option( 'hgroup1_content' ) );
						$phone_html .= "</span>";

						if ( $_SESSION['layoutType'] == 'mobile' ) {
							$phone_html .='</a>';
						}

						$phone_html .='</strong>';
					}
					?>
					<?php echo $phone_html; ?>
				</div>
			<?php endif; ?>
			<?php if ( $header_col_2 ) : ?>
			<div class="<?php echo $col_class; ?> column hide-for-small text-center">
				<div class="icon">
					<span class="sha-calendar"></span>
				</div>
				<span class="info-title"><?php echo bon_get_option( 'hgroup2_title' ); ?></span>
				<span class="phone visit"><strong><a href="#" data-reveal-id="visit-modal" title="<?php echo esc_attr( bon_get_option( 'hgroup2_line1' ) ); ?>" <?php the_ga_event( "Contact", "Open Visit Request", "Menu Bar" ); ?>><?php echo esc_attr( bon_get_option( 'hgroup2_line1' ) ); ?></a></strong></span>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>

</div>
</hgroup> 
<?php
}

function get_formatted_phone_number() {

	$output = '<strong>';

	if ( $_SESSION['layoutType'] == 'mobile' ) {
		$output .= '<a href="tel:' . esc_attr( bon_get_option( 'hgroup1_content' ) ) . '"' . get_ga_event( "Contact", "Call", "Menu Bar" ) . '>';
	}

	$output .= esc_attr( bon_get_option( 'hgroup1_content' ) );

	if ( $_SESSION['layoutType'] == 'mobile' ) {
		$output .='</a>';
	}

	$output .='</strong>';

	return $output;
}


?>