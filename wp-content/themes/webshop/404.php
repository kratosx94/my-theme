<?php get_header();?>

    <img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height;?>"width="<?php echo get_custom_header()->width;?>" alt="" />

    <div class="content-area">
        <main>
            <section class="middle-area">
                <div class="container">
                    <div class="row">
                        <div class="error-404 col-md-9">

                            <header>
                                <h1> <?php _e('Page not found','mywebshop'); ?></h1>
                                <p> <?php _e('The page you are trying to reach dose not exist','mywebshop'); ?></p>
                            </header>

                            <div class="error">
                                <p><?php _e('How about doing another search?','mywebshop'); ?></p>
                                <?php
                                // adding the search from to the 404 page with widget for recent posts
                                get_search_form();
                                the_widget('WP_Widget_recent_Posts',
                                array
                                (
                                    'title'=> __('Latest Posts','mywebshop'),
                                    'number' => 3
                                ));
                                ?>
                            </div>
                        </div>
                     </div>
                </div>
            </section>
            <section class="map">
                <div class="container">
                    <div class="row">map</div>
                </div>
            </section>

        </main>
    </div>

<?php get_footer(); ?>