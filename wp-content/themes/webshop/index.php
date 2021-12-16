<?php get_header();
$title = get_field('page_title' );
?>

<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height;?>"width="<?php echo get_custom_header()->width;?>" alt="" />

<div class="content-area">
    <main>
        <section class="middle-area">
            <div class="container">
                <div class="row">
                    <div class="news col-md-9">
                        <?php // if there is posts
                        if (have_posts()):
                            // it will loop the posts
                            while (have_posts()): the_post();
                            // will require template-parts/content.php &  template-parts/content-image.php
                            //WordPress will always include file that have same name as the second parameter
                             get_template_part('template-parts/content',get_post_format());?>
                            <?php //ending while statement
                                endwhile;

                                // blog page pagination
                            the_posts_pagination(
                                array(
                                    'prev_text' => __('Previous','mywebshop'),
                                    'next_text' => __('Next','mywebshop')
                                )
                            );
                                ?>

<!--                        <div class="row">-->
<!--                            <div class="pages col-md-6 test-left">-->
<!--                                    --><?php //previous_posts_link("Newer Posts");?>
<!--                                <div class="pages col-md-6 test-right">-->
<!--                                    --><?php //next_posts_link("Older Posts>>");?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                                <?php
                                //if there is no post it will display there is nothing here
                                else:
                                ?>
                                <p> <?php _e('there is nothing here','mywebshop') ?></p>
                                <?php  // ending if statement
                                    endif;
                                    ?>

                    </div>
                    <aside class="sidebar col-md-3 h-100"><?php get_sidebar('blog'); ?></aside>
                </div>
            </div>
        </section>
        <section class="map">
            <div class="container">
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>