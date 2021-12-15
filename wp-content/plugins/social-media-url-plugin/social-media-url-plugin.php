    <?php
    /*
     * plugin name: social-media-url-plugin
     * description: adds the ability to change stuff
     * version: 0.5
     *
     */


    // exist if directly accessed

    if(! defined('ABSPATH'))
        {
            exit;
        }
    // define variable for path to this plugin file.
    define('HD_ESPW_LOCATION', dirname(__FILE__));
    define('HD_ESPW_LOCATION_URL',plugins_url('', __FILE__));
    /*
     * get registered social profiles
     * @return array of registered social profiles
     */
    function hd_espw_get_social_profiles()
        {
            //return a fillerable social profiles.
            return apply_filters(
                'hd_espw_social_profiles',
                array(

                )
            );
        }

    /**
     * @param $profiles
     * @return mixed
     *  registers the default social profiles.
        @reurn array
     */

    function hd_espw_register_default_social_profiles($profiles)
        {

            $profiles['facebook'] = array
            (
                'id' => 'hd_espw_facebook_url',
                'label' => __('Facebook url', 'hd-extensible-social-profiles-widget'),
                'class' => 'facebook',
                'description' => __('enter your facebook profile url', 'hd-extensible-social-profiles-widget'),
                'priority' => 10,
                'type' => 'text',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            );

            $profiles['linkedin'] = array
            (
                'id' => 'hd_espw_linkedin_url',
                'label' => __('Linkedin url', 'hd-extensible-social-profiles-widget'),
                'class' => 'facebook',
                'description' => __('enter your linkedin profile url', 'hd-extensible-social-profiles-widget'),
                'priority' => 20,
                'type' => 'text',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            );

            $profiles['twitter'] = array
            (
                'id' => 'hd_espw_twitter_url',
                'label' => __('Twitter url', 'hd-extensible-social-profiles-widget'),
                'class' => 'facebook',
                'description' => __('enter your twitter profile url', 'hd-extensible-social-profiles-widget'),
                'priority' => 40,
                'type' => 'text',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            );

            return $profiles;

        }

    add_filter('hd_espw_social_profiles','hd_espw_register_default_social_profiles',10,1);

    /**
     * register the social profiles with the customize in wordpress
     * @param $WP_customizer $wp_customize the customizer
     *
     */
    function hd_espw_register_social_customizer_settings($wp_customize)
        {
            // get the social profile
            $social_profiles = hd_espw_get_social_profiles();
            // if we have any social profiles
            if(! empty($social_profiles))
                {

                    // adding new section in the customize page of the website
                    $wp_customize->add_section(
                        'hd_espw_social',
                        array
                            (
                                'title' => __('social profiles'),
                                'description' => __('add social media profiles here.'),
                                'priority' => 160,
                                'capability' => 'edit_theme_options',
                            )
                    );
                    // looping the array
                    foreach ($social_profiles as $social_profile)
                    {
                        // adding customizer settings for this profiles sections
                        $wp_customize->add_setting(
                            $social_profile['id'],
                            array(
                                'default' => '',
                                'sanitize_callback' => $social_profile['sanitize_callback'],
                            )
                        );
                        // adding customizer control
                        $wp_customize->add_control(
                            $social_profile['id'],
                            array(
                                'type' => $social_profile['type'],
                                'priority' => $social_profile['priority'],
                                'section' => 'hd_espw_social',
                                'label' => $social_profile['label'],
                                'description' => $social_profile['description']
                            )
                        );
                    }
                }
        }
    add_action('customize_register','hd_espw_register_social_customizer_settings');

    /**
     * making a widget for the social profiles
     */
    function hd_espw_register_social_icons_widget()
        {
            register_widget('HD_ESPW_Social_Icons_Widget');
        }
    add_action('widgets_init', 'hd_espw_register_social_icons_widget');

    /** extend widgets class for our icon widget */

    class HD_ESPW_Social_Icons_Widget extends WP_Widget
        {
        // widget setup
            public function __construct()
                {
                    $widget_ops = array
                        (
                            'classname' => 'hd-espw-social-icons',
                            'description' => __('Output your sites social icons, based on the social profiles added to site custom'),
                        );
                    $control_ops = array
                        (
                            'id_base' => 'hd_espw_social_icons',
                        );
                    parent:: __construct('hd_espw_social_icons', 'Social Icons', $widget_ops, $control_ops);
                }

            // widget output on the website frontend
            public function widget($args, $instance)
                { // output before the widget content
                    echo wp_kses_post($args['before_widget']);
                    /**
                     * call an action which outputs the widget
                     * @param $args is an array of the widget arguments before_widget
                     * @param $instance is an array of the widget instance.
                     * @hooked hd_espw_social_icons_output_widget_title -10
                     * @hooked hd_espw_output_social_icons_widget_content -20
                     */
                    do_action('hd_espw_social_icons_widget_output', $args, $instance);
                    echo wp_kses_post($args['after_widget']);
                }
                // output the backend widget form
            public function form($instance)
                {
                    // get the saved title
                    $title = ! empty($instance['title']) ? $instance['title'] : '' ;
                    ?>
                    <p>
                        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'hd-extensible-social-profiles-widget' ); ?></label>
                        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
                    </p>

                    <p>
<?php
printf(
    __( 'To add social profiles, please use the social profile section in the %1$scustomizer%2$s.', 'hd-extensible-social-profiles-widget' ),
    '<a href="' . admin_url( 'customize.php' ) . '">',
    '</a>'
);
?>

                    </p>
<?php
                }

                /**
                 * controls the save function when the widget updates
                 * @param array $new_instance the newly saved widget instance
                 * @param arry $old_instance the old widget instance
                 * @return array the new instance up date
                 *
                 */
        public function update( $new_instance, $old_instance ) {

            // create an empty array to store new values in.
            $instance = array();

            // add the title to the array, stripping empty tags along the way.
            $instance['title'] = ( ! empty($new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

            // return the instance array to be saved.
            return $instance;

        }
    }

    /**
     * outputs the widget title for the social icons widget
     * @param array $args an array of widget args
     * @param array $instance the current of widget data
     *
     */
    function hd_espw_social_icons_output_widget_title($args, $instance)
        {
            if (! empty($instance['title']))
            {
                if (!empty($args['before_title']))
                {
                    echo wp_kses_post($args['before_title']);
                }
                echo esc_html($instance['title']);
                if(!empty($args['after_title']))
                {
                    echo wp_kses_post($args['after_title']);
                }
            }
        }
    add_action('hd_espw_social_icons_widget_output','hd_espw_social_icons_output_widget_title',10,2);

    function hd_espw_output_social_icons_widget_content($args,$instance)
        {
            $social_profiles = hd_espw_get_social_profiles();
            if (! empty($social_profiles))
                {
                    ?>
                    <ul class="hd-espw-social-icons">
                    <?php

                    foreach ($social_profiles as $social_profile)
                        {
                            $profile_url=get_theme_mod($social_profile['id']);

                            if(empty($profile_url))
                                {
                                    continue;
                                }
                            if(empty($social_profile['class']))
                                {
                                    $social_profile['class'] = strtolower( sanitize_title_with_dashes($social_profile['label']));
                                }
                            ?>
                        <li class="hd-espw-social-icons__item hd-espw-social-icons__item--<?php echo esc_attr($social_profile['class']); ?>">
                            <a target="_blank" class="hd-espw-social-icons__item-link" href="<?php echo esc_url($profile_url); ?>">
                                <i class="icons-<?php echo esc_attr($social_profile['class']); ?>"></i>
                                <span>
                                <?php echo esc_html($social_profile['label']); ?>
                                </span>
                            </a>
                        </li>
                        <?php
                        }
                    ?>
                    </ul>
    <?php
                }
        }
    add_action( 'hd_espw_social_icons_widget_output', 'hd_espw_output_social_icons_widget_content', 20, 2 );