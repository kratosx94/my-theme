<?php
/** template name: general template
 *
 */
?>
<?php get_header();?>
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height;?>"width="<?php echo get_custom_header()->width;?>" alt="" />


    <div class="content-area">
        <main>
            <section class="middle-area">
                <div class="container">
                        <div class="general-template">
                            <?php // if there is posts
                            if (have_posts()):
                                // it will loop the posts
                                while (have_posts()): the_post();
                                    ?>
                                    <article>
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php the_content();?></p>
                                    </article>
                                <p> <?php _e('this is about us page from the general-template page','mywebshop') ?></p>

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
            </section>
        </main>
    </div>

<?php get_footer(); ?>