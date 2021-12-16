<?php get_header();?>
    <div class="content-area">
        <main>
            <section class="middle-area">
                <div class="container">
                    <div class="row">
                        <aside class="sidebar col-md-3">sidebar</aside>
                        <div class="news col-md-9">
                            <?php // if there is posts
                            if (have_posts()):
                                // it will loop the posts
                                while (have_posts()): the_post();
                                    ?>
                                    <article>
                                        <h2><?php the_title(); ?></h2>
                                        <p>Posted in: <?php get_the_date();?> By <?php the_author_posts_link();?></p>
                                        <p>Categories: <?php the_category(' ');?> </p>
                                        <p><?php the_tags('Tags:',',');?></p>
                                        <p><?php the_content();?></p>
                                    </article>
                                <?php //ending while statement
                                endwhile;
                            //if there is no post it will display there is nothing here
                            else:
                                ?>
                                <p> <?php _e('there is nothing here','mywebshop') ?> </p>
                            <?php  // ending if statement
                            endif;
                            ?>


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