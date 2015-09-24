<?php 
/*
* Template Name: Team
*/
get_header(); 

$headContact = bon_get_option( 'about_us_heading_contact' );

?>
<div id="inner-wrap" class="">

    <div id="body-container" class="container">

        <?php 

        /**
         * Shandora Before Loop Hook
         *
         * @hooked shandora_get_page_header - 1
         * @hooked shandora_search_get_listing - 2
         * @hooked shandora_open_main_content_row - 5
         * @hooked shandora_get_left_sidebar - 10
         * @hooked shandora_open_main_content_column - 15
         *
         */

        do_atomic('before_loop'); ?>

        <ul class="bon-toolkit-accordion" id="accordion-agent">

            <?php

            // setup loop to fetch 1 most expensive item for each category to display it's image as category image
            $args = array(
                'post_type' => 'agent',
                'posts_per_page' => 10,
                'order' => 'ASC',
                'orderby' => 'menu_order'
                );

            $wp_query = new WP_Query($args);

            while ( have_posts() ) : the_post(); ?>

            <li class="accordion-group">
                <input type="radio" name="toggle-section-agent" id="toggle-target-<?php echo $wp_query->current_post + 10; ?>"<?php if ( $wp_query->current_post == 0 ) echo ' checked'; ?>>
                <label for="toggle-target-<?php echo $wp_query->current_post + 10; ?>" class="accordion-section-title">
                    <span class="like-h5"><?php the_title(); ?></span>
                    <?php if ( $area = shandora_get_meta( $post->ID, 'agentarea' ) ) { ?>
                    <span class="right"><i class="icon bonicons bi-map-marker text main"></i> <?php echo $area; ?></span>
                    <?php } ?>
                </label>
                <span class="accordion-open"><i class="sha-arrow-down"></i></span>
                <span class="accordion-close"><i class="sha-arrow-right"></i></span>
                <div class="toggle-content">
                    <div class="agent-profile<?php echo has_post_thumbnail() ? ' has-img' : ''; ?>">
                        <?php if ( has_post_thumbnail() ) { ?>
                        <div class="profile-header center">
                            <?php if ( current_theme_supports( 'get-the-image' ) ) {
                                $thumbnail = get_the_image( array( 'size' => 'thumbnail', 'link_to_post' => false, 'before' => '<figure class="agent-image">', 'after' => '</figure>', 'image_class' => array('circle') ) );
                            } ?>
                        </div>
                        <?php } ?>
                        <div class="profile-content">                        
                            <?php if ( $job = shandora_get_meta( $post->ID, 'agentjob' ) ) { ?>
                            <p class="like-h5"><?php echo $job; ?></p>
                            <?php } ?>
                            <ul class="bi-ul">
                                <?php if ( $area ) { ?>
                                <li><i class="bi-li icon bonicons bi-map-marker text main"></i> <?php echo $area; ?></li>
                                <?php } ?>
                                <?php if ( $email = shandora_get_meta( $post->ID, 'agentemail' ) ) { ?>
                                <li><i class="bi-li icon bonicons bi-envelope text main"></i> <?php echo encrypt_email($email); ?></li>
                                <?php } ?>
                                <?php if ( $phone = shandora_get_meta( $post->ID, 'agentofficephone' ) ) { ?>
                                <li><i class="bi-li icon bonicons bi-phone text main"></i> <?php echo $phone; ?></li>
                                <?php } ?>
                                <?php if ( $mobile = shandora_get_meta( $post->ID, 'agentmobilephone' ) ) { ?>
                                <li><i class="bi-li icon bonicons bi-mobile text main"></i> <?php echo $mobile; ?></li>
                                <?php } ?>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <?php endwhile;

            wp_reset_query();

            ?>

        </ul>

        <?php if ( $headContact ) { ?>

        <section class="row entry-content">

            <header class="column large-12">
                <h3><?php echo $headContact; ?></h3>
                <hr />
            </header>
            <div class="column large-12">
                <p><?php echo $contentContact; ?></p>
            </div>
            <?php bon_get_template_part( 'block', 'contactform-faq' ); ?>
        </section>

        <?php } ?>
        
        <?php 

            /**
             * Shandora After Loop Hook
             *
             * @hooked shandora_close_main_content_column - 1
             * @hooked shandora_get_right_sidebar - 5
             * @hooked shandora_close_main_content_row - 10
             *
             */

            do_atomic('after_loop'); ?>

        </div>


        <?php get_footer(); ?>
