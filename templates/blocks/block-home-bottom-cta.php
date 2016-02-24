<?php
$visited = shandora_get_meta( $GLOBALS['home-img'], 'slider_returning' );
?>
<section>
	<header class="section-header">
		<h2 class="home-section-header"><?php echo $visited !== "3" ? __( "Your house of rest and relaxation", "bon" ) : __( "Do you find it hard which house to choose?", "bon" ); ?></h2>
	</header>
	<div  class="row entry-row">
		<div class="padding-medium clearfix">
			<div class="column large-12 text-center home-ctas-container bottom">
				<div class="table centered border-spacing">
					<div class="home-ctas-container table-row">

						<?php if ( $visited != 3 ) { ?>

						<a href="<?php echo get_the_permalink( bon_get_option( 'catalog_page' ) ); ?>" class="button flat large radius main" <?php the_ga_event( 'CTA', 'Click on Home Page', "Browse all Cottages" ); ?>>
							<span><?php _e( "Choose a house for you", "bon" ); ?></span>
						</a>
						<a href="<?php echo get_the_permalink( bon_get_option( 'quality_page' ) ); ?>" class="button flat large radius silver" <?php the_ga_event( 'CTA', 'Click on Home Page', "Browse all Cottages" ); ?>>
							<span><?php _e( "Learn more about us", "bon" ); ?></span>
						</a>

						<?php } else { ?>

						<a href="#" class="button flat large radius main" data-reveal-id="visit-modal" <?php the_ga_event( 'CTA', 'Click on Home Page', "Browse all Cottages" ); ?>>
							<span><?php _e( "Order a free consultation", "bon" ); ?></span><i class="bonicons bi-chevron-right"></i>
						</a>

						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>