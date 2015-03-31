<?php

$sizemeasurement = bon_get_option( 'measurement' );

$heightmeasurement = bon_get_option( 'height_measure' );

$suffix = SHANDORA_MB_SUFFIX;
$packages = get_packages_list();

$rooms = shandora_get_meta( $post->ID, 'listing_rooms' );

$size = shandora_get_meta( $post->ID, 'listing_lotsize' );

$wall = array();

foreach ( $packages as $key => $package ) {

	if ( $key === 0 ) {

		$package_prefix = $suffix . $package['package_name'];
		$wall[] = shandora_get_meta( $post->ID, $package_prefix . '_wall_thickness', true);

	}

}

?>
<ul class="large-custom-grid-5 small-custom-grid-3">

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

	<?php foreach ( $wall as $key => $value ) { ?>

	<li class="wall<?php echo ( $key === 0 ) ? ' active' : ' hide'; ?>"><div class="meta-wrap">
		<i class="sha-wall"></i>
		<span class="meta-value">
			<span data-meta="thickness"><?php echo $value; ?></span><?php echo ' ' . strtolower($heightmeasurement); ?>
			<span><em><strong><?php echo strtolower( __( 'Wall thickness', 'bon' ) ); ?></strong></em></span>
		</span></div>
	</li>

	<?php } ?>

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