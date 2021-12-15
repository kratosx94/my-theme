<?php get_header();?>
    <div class="content-area">
        <main>
            <section class="slide">
                <div class="container">
                    <div class="row"> <?php
                        echo do_shortcode('[smartslider3 slider="2"]');
                        ?> </div>
                </div>
            </section>

            <section class="services">
                <div class="container">
                    <h1>Our services</h1>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="services-item">
                                <?php
                                // if statement for the services sidebar
                                if(is_active_sidebar('services-1'))
                                    {
                                        dynamic_sidebar('services-1');
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="services-item">
                                <?php
                                if(is_active_sidebar('services-2'))
                                    {
                                        dynamic_sidebar('services-2');
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="services-item">
                                <?php
                                if(is_active_sidebar('services-3'))
                                    {
                                        dynamic_sidebar('services-3');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="middle-area">
                <div class="container">
                    <div class="row">
                        <aside class="sidebar col-md-3 h-100"><?php get_sidebar('home'); ?></aside>
                        <div class="news col-md-9">
                            <div class="container">
                                <div class="row">

                                    <?php
                                        // first custom loop to show featured ( latest post in the site )
                                    $MainPost = new WP_Query( 'post_type=post&posts_per_page=1&cat=25,27,28' );

                                    if( $MainPost->have_posts() ):
                                        while( $MainPost->have_posts() ): $MainPost->the_post();
                                            ?>

                                            <div class="col-12">
                                                <?php get_template_part( 'template-parts/content', 'mainpost' ); ?>
                                            </div>

                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                                    <?php
                                    // second custom loop
                                    /*  new array to include and exclude categories
                                    if you want to add new categories you have to write the id number in the array
                                    if you want to exclude any categories you have to write the id number in the array
                                    */
                                    $args = array(
                                            'post_type' => 'post',
                                            // limiting the posts in the page to 2
                                            'posts_per_page' => 2,
                                            // excluding categories from the home page
                                            'category__not_in' => array(1),
                                            // including categories for the home page
                                            'category__in' => array(25,27,28),
                                            // new array argument to prevent homepage from double showing the latest post
                                            'offset' => 1
                                    );
                                    // passing the array into the wp_query class
                                    $SecondaryPost = new WP_Query( $args );

                                    if( $SecondaryPost->have_posts() ):
                                        while( $SecondaryPost->have_posts() ): $SecondaryPost->the_post();
                                            ?>

                                            <div class="col-sm-6">
                                                <?php get_template_part( 'template-parts/content', 'secondarypost' ); ?>
                                            </div>

                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  google maps api added to the page just before the footer menu            -->
            <section class="map">
                <!--adding vars to the api key and the address in customizer.-->
                <?php
                $key = get_theme_mod('map_settings') ;
                $address = urlencode(get_theme_mod('settings_map_address'));

                ?>
                <iframe
                        width="100%"
                        height="350"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?key=<?php echo $key; ?> &q=<?php echo $address; ?>&zoom=15">
                </iframe>
            </section>

        </main>
    </div>

<?php get_footer(); ?>