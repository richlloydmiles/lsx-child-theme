<?php
$includes_path = get_stylesheet_directory() . '/includes/';
include( $includes_path . 'bst-config.php' );
include( $includes_path . 'bst-layout.php' );

// Image Sizes
add_image_size( 'project-featured', 600, 480, true );
add_image_size( 'project-thumb', 320 , 213, true );