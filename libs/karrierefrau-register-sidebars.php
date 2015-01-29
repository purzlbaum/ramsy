<?php

/**
 * Register our sidebars and widgetized areas.
 *
 */
function karrierefrau_widgets_init()
{

    register_sidebar(array(
        'name' => 'Sidebar links',
        'id' => 'sidebar-left',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'karrierefrau_widgets_init');