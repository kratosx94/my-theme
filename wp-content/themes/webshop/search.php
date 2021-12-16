<?php get_header();?>
    <img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height;?>"width="<?php echo get_custom_header()->width;?>" alt="" />

    <div id="primary">
        <div id="main">
            <div class="container">
                <h2>Search results for: <?php echo get_search_query();?></h2>
                <?php
                get_search_form();
                while(have_posts()  ):
                    the_post();
                    get_template_part('template-parts/content', 'search');
                    if(comments_open() || get_comments_number()):
                        comments_template('/comments.php');

                    endif;
                endwhile;
                the_posts_pagination(
                        array(
                                'prev_text' => __('Previous','mywebshop'),
                                'next_text' => __('Next','mywebshop')
                            )
                );
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>