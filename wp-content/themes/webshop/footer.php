<footer>

    <div class="container">
        <div class="row">
            <div class="copyright col-sm-7 col-4">
                <p><?php echo get_theme_mod('copyright_settings');?></p>
            </div>
            <nav class="footer-menu col-sm-5 col-8 text-right">
                <!--    function to add footer navigation into the footer-->
                <?php  wp_nav_menu(array('theme_location' => 'my_footer_menu'));?>
            </nav>
        </div>
    </div>
</footer>
<?php wp_footer();?>
</body>
</html>