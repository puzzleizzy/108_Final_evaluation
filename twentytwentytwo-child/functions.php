<?php


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'twentytwentytwo-style'; // This is 'twentytwentytwo-style' for the Twenty Twenty Two theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

// anything added to the child theme- must make a copy because it is going to over write the adult theme.. (adding template files)
// "A child theme allows you to change small aspects of your site’s appearance yet still preserve your theme’s look and functionality."
