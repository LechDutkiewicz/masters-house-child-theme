<?php if ( shandora_get_meta( get_the_ID(), 'listing_enable_packages' ) ) { ?>

<ul class="large-custom-grid-5 small-custom-grid-1">

	<?php

// setup variables

	$sizemeasurement = bon_get_option( 'measurement' );
	$heightmeasurement = bon_get_option( 'height_measure' );
	$packages = get_packages_list();
	$rooms = shandora_get_meta( $post->ID, 'listing_rooms' );
	$size = shandora_get_meta( $post->ID, 'listing_lotsize' );
	$packages = get_packages_list();
	$wall = $packages[0];

	?>

	<?php if( !empty( $rooms ) ) { ?>

	<li class="room"><div class="meta-wrap">
		<i class="sha-room"></i>
		<span class="meta-value">
			<?php 
			($rooms > 0) ? printf(_n( '1 Room', '%s Rooms', $rooms, 'bon' ), $rooms) : _e('No Room','bon'); 
			?>
		</span></div>
	</li>

	<?php } ?>

	<?php if( !empty( $size ) ) { ?>

	<li class="area"><div class="meta-wrap">
		<i class="sha-area"></i>
		<span class="meta-value">
			<?php echo $size . ' ' . $sizemeasurement; ?>
		</span></div>
	</li>

	<?php } ?>

	<?php if( !empty( $wall ) ) { ?>

	<li class="wall"><div class="meta-wrap">
		<i class="sha-wall"></i>
		<span class="meta-value">
			<span><em><strong><?php _e( 'Wall thickness', 'bon' ); ?></strong></em></span>
			<span data-meta="thickness"><?php echo($wall['package_wall_thickness']); ?></span><?php echo ' ' . strtolower($heightmeasurement); ?>
		</span></div>
	</li>

	<?php } ?>

	<?php if( !empty( $size ) ) { ?>

	<li class="roof"><div class="meta-wrap">
		<i class="sha-roof"></i>
		<span class="meta-value">
			<em><strong><?php _e( 'Insulated', 'bon' ); ?></strong></em> <?php _e( 'roof', 'bon' ); ?>
		</span></div>
	</li>

	<?php } ?>

	<?php if( !empty( $size ) ) { ?>

	<li class="drill"><div class="meta-wrap">
		<i class="sha-drill"></i>
		<span class="meta-value">
			<em><strong><?php _e( 'Assemblage', 'bon' ); ?></strong></em> <?php _e( 'included', 'bon' ); ?>
		</span></div>
	</li>

</ul>

<?php } ?>

<?php } else if ( shandora_get_meta( get_the_ID(), 'listing_enable_construction' ) ) { ?>

<ul class="large-custom-grid-3 small-custom-grid-1">

	<li class="timer"><div class="meta-wrap">
		<i class="sha-timer"></i>
		<span class="meta-value">
			<em><strong><?php _e( 'Quick assemblage', 'bon' ); ?></strong></em>
		</span></div>
	</li>

	<li class="roof-2"><div class="meta-wrap">
		<i class="sha-roof-2"></i>
		<span class="meta-value">
			<em><strong><?php _e( 'Robust construction', 'bon' ); ?></strong></em>
		</span></div>
	</li>

	<li class="wood"><div class="meta-wrap">
		<i class="sha-wood"></i>
		<span class="meta-value">
			<em><strong><?php _e( 'Glued wood', 'bon' ); ?></strong></em>
		</span></div>
	</li>

</ul>

<?php } ?>