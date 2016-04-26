<?php 
/*
* Template Name: All Cottages
*/
get_header(); 

?>
<div id="inner-wrap" class="<?php echo shandora_is_home() ? 'home ' : ''; ?>slide">

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

        do_atomic('before_loop');

        // get categories that should be displayed on all categories page
        $cats = bon_get_option( 'cats_order' );

        foreach ($cats as $cat) {

                // get term object for each category
            $term = get_term($cat['cat_name'], 'property-type');
            $id = $term->term_id;
                // get color for each category
            $color = get_option( "taxonomy_$id" );

                // setup loop to fetch 1 most expensive item for each category to display it's image as category image
            $listing_args = array(
                'post_type' => 'listing',
                'posts_per_page' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'property-type',
                        'terms' => $id
                        ),
                    ),
                'meta_key' => bon_get_prefix() . 'listing_price',
                'orderby' => 'meta_value_num',
                'order' => 'DSC'
                );

            $wp_query = new WP_Query($listing_args);

            while ( have_posts() ) : the_post();

            include ( locate_template("templates/contents/content-category.php") );

            endwhile;

            wp_reset_query();
        }

            /**
             * Shandora After Loop Hook
             *
             * @hooked shandora_close_main_content_column - 1
             * @hooked shandora_get_right_sidebar - 5
             * @hooked shandora_close_main_content_row - 10
             *
             */

            do_atomic('before_pagination');

            do_atomic('after_loop'); ?>

        </div>

        <?php get_footer(); ?>
