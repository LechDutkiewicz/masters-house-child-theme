<section>
	<?php if (shandora_is_home()) { ?>
	<header class="section-header">
		<h2 class="home-section-header"><?php _e( "Why us?", "bon"); ?></h2>
	</header>
	<?php } else { ?>
	<header>
		<h3><?php _e( "Why us?", "bon"); ?></h3>
		<hr />
	</header>
	<?php } ?>
	<?php bon_get_template_part( 'block', 'listing/services' ); ?>
</section>