<?php

// Copyrights customizer

 function my_customizer($wp_customize){
     $wp_customize-> add_section('my_copyright',
     array
     (
        'title' => __('Copyright','mywebshop'),
        'description' => __('Type your copyrights','mywebshop')
     ));

     $wp_customize-> add_setting('copyright_settings',
     array
     (
         'type' => 'theme_mod',
         'default' => 'Copyright - all rights reserved',
         'sanitize_callback' => 'esc_attr'
     )) ;

     $wp_customize-> add_control('copyright_ctrl',
         array
         (
             'label' => __('copyright information','mywebshop'),
             'description' => __('please type your copyright','mywebshop'),
             'section' => 'my_copyright',
             'settings' => 'copyright_settings',
             'type' => 'text'
         )) ;

     // map customizer
     $wp_customize-> add_section('sec_map',
         array
         (
             'title' => 'Map',
             'description' => 'Map section'
         ));
        //api keys in page-home key = map_settings
     $wp_customize-> add_setting('map_settings',
         array
         (
             'type' => 'theme_mod',
             'default' => '',
             'sanitize_callback' => 'esc_attr'
         )) ;
     $wp_customize-> add_control('map_ctrl',
         array
         (
             'label' => __('Google maps api','mywebshop'),
             'description' => __('Api <a target="_blank" href="https://console.developers.google.com/flows/enableapi?apiid=maps_backend">here </a>','mywebshop'),
             'section' => 'sec_map',
             'settings' => 'map_settings',
             'type' => 'text'
         )) ;

    // map address , in page-home address = settings_map_address
     $wp_customize-> add_setting('settings_map_address',
         array
         (
             'type' => 'theme_mod',
             'default' => '',
             'sanitize_callback' => 'esc_textarea'
         )) ;
     $wp_customize-> add_control('map_ctrl_address',
         array
         (
             'label' => __('type address','mywebshop'),
             'description' => __('No special characters please','mywebshop'),
             'section' => 'sec_map',
             'settings' => 'settings_map_address',
             'type' => 'textarea'
         )) ;

 }

 add_action('customize_register', 'my_customizer');

