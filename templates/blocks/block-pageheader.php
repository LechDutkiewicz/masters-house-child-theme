<?php global $post; ?>

<div id="page-header" class="show-for-medium-up">
	<div class="row">
		<div class="column large-6">
			<h1 class="page-title">
				<?php
					if(!is_home()) {
						//bon_document_title();
						echo bon_wp_title();
					} else {
						_e('Home', 'bon'); 
					}
				?>
			</h1>
		</div>
		<div class="column large-6">
			<?php if ( current_theme_supports( 'bon-breadcrumb-trail' ) ) bon_breadcrumb_trail( array( 'show_browse'=> false, 'container' => 'nav', 'separator' => '&rsaquo;', 'before' => '' ) ); ?>
		</div>
	</div>
</div>