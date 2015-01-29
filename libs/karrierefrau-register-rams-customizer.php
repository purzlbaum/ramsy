<?php

// Rams theme options
class rams_child_Customize {

    public static function rams_child_register ( $wp_customize ) {

        //1. Define a new section (if desired) to the Theme Customizer
        $wp_customize->add_section( 'rams_options',
            array(
                'title' => __( 'Options for Rams', 'rams' ), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'description' => __('Allows you to customize theme settings for Rams.', 'rams'), //Descriptive tooltip
            )
        );

        //2. Register new settings to the WP database...
        $wp_customize->add_setting( 'accent_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
            array(
                'default' => '#6AA897', //Default setting/value to save
                'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            )
        );

        //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
        $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
            $wp_customize, //Pass the $wp_customize object (required)
            'rams_accent_color', //Set a unique ID for the control
            array(
                'label' => __( 'Accent Color', 'rams' ), //Admin-visible name of the control
                'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                'settings' => 'accent_color', //Which setting to load and manipulate (serialized is okay)
                'priority' => 10, //Determines the order this control appears in for the specified section
            )
        ) );

        //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    }

    public static function rams_child_header_output() {
        ?>

        <!-- Customizer CSS -->

        <style type="text/css">
            <?php self::rams_generate_css('body a', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('body a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.top-nav-fixed', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.main-menu .sub-menu', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.sidebar', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.social-links a i', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.flex-direction-nav a:hover', 'background-color', 'accent_color'); ?>
            <?php self::rams_generate_css('a.post-quote:hover', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-title a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-content a', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-content a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-content a:hover', 'border-bottom-color', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-content a.more-link:hover', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-content input[type="submit"]:hover', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-content input[type="button"]:hover', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-content input[type="reset"]:hover', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('#infinite-handle span:hover', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.page-links a:hover', 'background', 'accent_color'); ?>
            <?php self::rams_generate_css('.post-meta-inner a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.add-comment-title a', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.add-comment-title a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.bypostauthor .avatar', 'border-color', 'accent_color'); ?>
            <?php self::rams_generate_css('.comment-actions a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.comment-header h4 a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('#cancel-comment-reply-link', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.comments-nav a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.comment-form input[type="submit"]:hover', 'background-color', 'accent_color'); ?>
            <?php self::rams_generate_css('.logged-in-as a:hover', 'color', 'accent_color'); ?>
            <?php self::rams_generate_css('.archive-nav a:hover', 'color', 'accent_color'); ?>
        </style>

        <!--/Customizer CSS-->

    <?php
    }

    public static function rams_live_preview() {
        wp_enqueue_script(
            'rams-themecustomizer', // Give the script a unique ID
            get_stylesheet_directory_uri() . '/js/theme-customizer.js', // Define the path to the JS file
            array(  'jquery', 'customize-preview' ), // Define dependencies
            '', // Define a version (optional)
            true // Specify whether to put in footer (leave this true)
        );
    }

    public static function rams_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if ( ! empty( $mod ) ) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix.$mod.$postfix
            );
            if ( $echo ) {
                echo $return;
            }
        }
        return $return;
    }
}

remove_action( 'customize_register' , array( 'rams_Customize' , 'rams_register' ) );
remove_action( 'wp_head' , array( 'rams_Customize' , 'rams_header_output' ) );
remove_action( 'customize_preview_init' , array( 'rams_Customize' , 'rams_live_preview' ) );

add_action( 'customize_register' , array( 'rams_child_Customize' , 'rams_child_register' ) );
add_action( 'wp_head' , array( 'rams_child_Customize' , 'rams_child_header_output' ) );
add_action( 'customize_preview_init' , array( 'rams_child_Customize' , 'rams_live_preview' ) );
