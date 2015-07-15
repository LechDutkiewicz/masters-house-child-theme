<?php
$visited = shandora_get_meta( $GLOBALS['home-img'], 'slider_returning' );

if ( $visited != 3 ) {
	// get parameters for home call to action
	$slogan = bon_get_option( 'home_slogan', 5 );
	$ctas = bon_get_option( 'home_cta', 5 );
} else {
	// get parameters for home call to action for returning users, that opens modal with contact form
	$slogan = bon_get_option( 'home_slogan_returning', 5 );
	$ctas = bon_get_option( 'home_cta_returning', 5 );
}

// get parameters for drawing tool button
$tool = bon_get_option( 'home_cta_tool');

?>
<section>
	<header class="section-header">
		<?php if ( $slogan ) { ?>
		<h2 class="home-section-header"><?php echo $slogan; ?></h2>
		<?php } ?>
	</header>

	<?php if ( $ctas ) { ?>
	<div  class="row entry-row">
		<div class="padding-medium clearfix">
			<div class="column large-12 text-center home-ctas-container bottom">
				<div class="table centered border-spacing">
					<div class="home-ctas-container table-row">
						<?php shandora_home_cta( $ctas, $tool, $visited ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

</section>