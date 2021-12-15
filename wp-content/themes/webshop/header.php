<!doctype html>
<!--  adding language attributes to support all languages-->
    <html <?php language_attributes(); ?> >
        <head>
            <meta charset="<?php bloginfo('charset');?>">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <?php wp_head();?>
        </head>
        <body <?php body_class(); ?>>

            <header>
                <section class="top-bar">
                    <div class="container">
                        <div class="row">
                            <div class="social-media-icons col-xl-10 col-md-8 col-sm-8 col-6">
                                <?php

                                if( is_active_sidebar( 'social-media') ){
                                    dynamic_sidebar( 'social-media' );
                                }

                                ?>
                            </div>

                            <div class="search col-xl-2 col-md-4 col-sm-4 col-6 text-end">Search for:
                                <?php // adding search box for the header
                                get_search_form();
                                ?>
                            </div>
                        </div>
                    </div>

                </section>
                    <section class="menu-area">
                        <div class="container">
                                <div class="row">
                                    <div class="align">
                                        <div class="logo col-md-2 col-sm-12 col-12 text-center"><?php the_custom_logo();?></div>
                                        <nav class="main-menu col-md-12 text-right text-uppercase">
                                            <div class="container-fluid text-right">
                                                <nav class="main-menu col-md-10 text-right">
                                                    <?php wp_nav_menu( array( 'theme_location' => 'my_header_menu' ) ); ?>
                                            </nav>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                </section>
            </header>
