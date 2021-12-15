<?php
/**
 * Template for displaying search forms in mytheme
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
<!--          remember to hide the screen reader text in css -->
<!--        <span class="screen-reader-text">--><?php //echo _x( 'Search for:', 'label', 'mytheme' ); ?><!--</span>-->
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'mytheme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <!--                           remember to hide the screen reader text in css -->
    <span> <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Ok', 'submit button', 'mytheme' ); ?></span></button>
</form>
