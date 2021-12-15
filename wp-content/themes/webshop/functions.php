<?php

// theme customizer require
require get_template_directory() . '/inc/customizer.php';

function my_function_register_style()
    {
        wp_enqueue_script('bootstrap-js',
            "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js",
            array(''),
            '5.1.3',
            true);

        wp_enqueue_style('bootstrap-css',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css',
            array(),
            '5.1.3',
            'all');

        wp_enqueue_style('template',
            get_template_directory_uri().'/assets/css/template.css',
            array(),
            '1.0',
            'all');
    }
add_action('wp_enqueue_scripts', 'my_function_register_style');

// main theme configuration function
function my_webshop_theme_config(){
    // register our theme menus
    register_nav_menus(
        array(
            'my_header_menu' => __( 'Main Menu' ),
            'my_footer_menu' => __( 'footer nav' ),
            'my_sidebar_menu' => __('sidebar nav')
        )

    );//header options
    $args = array(
        'height' => 225,
        'width' => 1920
    );

    add_theme_support('custom-header',$args);
    // adding metabox for post thumbnails
    add_theme_support( 'post-thumbnails' );
    // adding metabox for post formats
    add_theme_support( 'post-formats', array( 'video', 'image' ));
    // adding titles for the pages
    add_theme_support('title-tag');
    //adding theme support for our site logo
    add_theme_support('custom-logo', array
    (
        'height' => 110,
        'width' => 200
    ));

    $textdomain = 'mywebshop';
    load_theme_textdomain($textdomain,get_template_directory(). '/languages/');
}
add_action('after_setup_theme','my_webshop_theme_config', 0);


//sidebar config
add_action('widgets_init','my_sidebars');
function my_sidebars(){
    register_sidebar(
        array(
            'name'=> __('homepage sidebar','mywebshop'),
            'id' => __('sidebar-1','mywebshop'),
            'description' => __('this is the home page sidebar, add your widgets here','mywebshop'),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'=> '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'

        )
    );
    register_sidebar(
        array(
            'name'=> __('blog sidebar','mywebshop'),
            'id' => __('sidebar-2','mywebshop'),
            'description' => __('this is the blog page sidebar, add your widgets here', 'mywebshop'),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'=> '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'

        )
    );

    register_sidebar(
        array(
            'name' => 'Service 1',
            'id' => 'services-1',
            'description' => 'First Services Area. ',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Service 2',
            'id' => 'services-2',
            'description' => 'Second Services Area. ',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Service 3',
            'id' => 'services-3',
            'description' => 'Third Services Area. ',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'social-media',
            'id' => 'social-media',
            'description' => 'Social media  ',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}
// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach($this->current_item->classes as $class) {
            if(in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');


