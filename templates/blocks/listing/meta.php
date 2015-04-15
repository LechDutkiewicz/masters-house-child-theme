<?php

$sizemeasurement = bon_get_option( 'measurement' );

$heightmeasurement = bon_get_option( 'height_measure' );

$suffix = SHANDORA_MB_SUFFIX;
$packages = get_packages_list();

$rooms = shandora_get_meta( $post->ID, 'listing_rooms' );

$size = shandora_get_meta( $post->ID, 'listing_lotsize' );

// Uncomment this if each product would have it's own package descriptions

/*$wall = array();

foreach ( $packages as $key => $package ) {

	if ( $key === 0 ) {

		$package_prefix = $suffix . $package['package_name'];
		$wall[] = shandora_get_meta( $post->ID, $package_prefix . '_wall_thickness', true);

	}

}*/

$packages = get_packages_list();

$wall = $packages[0];

?>
<ul class="large-custom-grid-5 small-custom-grid-1">

	<?php if( !empty( $rooms ) ) : ?>
	<li class="room"><div class="meta-wrap">
		<i class="sha-room"></i>
		<span class="meta-value">
			<?php 
			($rooms > 0) ? printf(_n( '1 Room', '%s Rooms', $rooms, 'bon' ), $rooms) : _e('No Room','bon'); 
			?>
		</span></div>
	</li>
<?php endif; ?>

<?php if( !empty( $size ) ) : ?>
	<li class="area"><div class="meta-wrap">
		<i class="sha-area"></i>
		<span class="meta-value">
			<?php echo $size . ' ' . strtolower($sizemeasurement); ?>
		</span></div>
	</li>
<?php endif; ?>

<?php if( !empty( $wall ) ) : ?>

	<li class="wall"><div class="meta-wrap">
		<i class="sha-wall"></i>
		<span class="meta-value">
			<span><em><strong><?php _e( 'Wall thickness', 'bon' ); ?></strong></em></span>
			<span data-meta="thickness"><?php echo($wall['package_wall_thickness']); ?></span><?php echo ' ' . strtolower($heightmeasurement); ?>
		</span></div>
	</li>

<?php endif; ?>

<?php if( !empty( $size ) ) : ?>
	<li class="roof"><div class="meta-wrap">
		<i class="sha-roof"></i>
		<span class="meta-value">
			<em><strong><?php _e( 'Insulated', 'bon' ); ?></strong></em> <?php _e( 'roof', 'bon' ); ?>
		</span></div>
	</li>
<?php endif; ?>

<?php if( !empty( $size ) ) : ?>
	<li class="drill"><div class="meta-wrap">
		<i class="sha-drill"></i>
		<span class="meta-value">
			<em><strong><?php _e( 'Assemblage', 'bon' ); ?></strong></em> <?php _e( 'included', 'bon' ); ?>
		</span></div>
	</li>
<?php endif; ?>

</ul>