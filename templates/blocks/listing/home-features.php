<?php if ( $_SESSION['layoutType'] === 'mobile' ) $exClass = 'text-center'; ?>
<?php
$args = array(
	'post_type' => 'home-feature',
	'posts_per_page' => 10,
	'orderby' => 'menu_order',
	'order' => 'ASC'
	);
$loop = new WP_Query( $args );
if ( !empty( $loop->posts ) ) :
	?>
<section>
	<?php if (shandora_is_home()) : ?>
	<header class="section-header">
		<h3 class="home-section-header"><?php echo bon_get_option( 'home_features_title', 'yes' ); ?></h3>
	</header>
<?php else : ?>
	<header>
		<h3><?php echo bon_get_option( 'home_features_title', 'yes' ); ?></h3>
		<hr />
	</header>
<?php endif; ?>
<div  class="row entry-row">
	<div class="padding-medium clearfix">
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="column large-4 text service-container <?php echo $exClass; ?>">
			<div class="round-icon icon-wrapper bg-flat-<?php echo shandora_get_meta( $post->ID, 'featureiconcolor' ); ?>">
				<i class="icon-anim-left-right bonicons <?php echo shandora_get_meta( $post->ID, 'featureicon' ); ?>"></i>
			</div>
			<div class="service-content">
				<h2 class="service-title"><?php the_title(); ?></h2>
				<p class="service-summary"><?php echo get_the_content(); ?></p>
			</div>
		</div>
		<?php
		endwhile;
		endif;
		wp_reset_query();
		?>
	</div>
</div>
</section>