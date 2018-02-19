<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */
 // add_filter( 'woocommerce_resize_images','__return_false' );
 // add_filter( 'woocommerce_background_image_regeneration','__return_false' );

  // function console_log( $data ){
  //   echo '<script>';
  //   echo 'console.log('. json_encode( $data ) .')';
  //   echo '</script>';
  // }

function ddd_conditional_serve() {
  if (is_product()) {
    global $is_IE;
    if ($is_IE) {
      wp_register_script('3dcustomIE', get_stylesheet_directory_uri().'/js/mainIE.js', false, null, true);
      wp_localize_script('3dcustomIE', 'WPURL', array( 'templateUrl' => wp_upload_dir() ));
      wp_enqueue_script('3dcustomIE');
    } else {
      wp_register_script('3dcustom', get_stylesheet_directory_uri().'/js/main.js', false, null, true);
      wp_localize_script('3dcustom', 'WPURL', array( 'templateUrl' => wp_upload_dir() ));
      wp_enqueue_script('3dcustom');
    }
  }
}
add_action( 'wp_enqueue_scripts', 'ddd_conditional_serve' );

 require 'custom-functions.php';
 require 'products/curtains.php';
 require 'products/curtains_personal.php';
 require 'products/valances.php';
 require 'products/pillow_cases.php';

 //Stop Wordpress from messing with my images
 add_filter('jpeg_quality', function($arg){return 100;});
 remove_image_size('large');
 remove_image_size('medium');
 remove_image_size('thumbnail');

 add_filter( 'woocommerce_resize_images','__return_false' );
 add_filter( 'woocommerce_background_image_regeneration','__return_false' );

 // add_filter( 'woocommerce_resize_images','__return_false' );
 // add_filter( 'woocommerce_background_image_regeneration','__return_false' );
 // add_filter('woocommerce_resize_images', 'stop_wc_resize');
 // function stop_wc_resize() {
 //    return false;
 // }
