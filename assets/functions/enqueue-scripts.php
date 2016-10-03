<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load modernizr files in footer
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.min.js', array(), '', true );
    
    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.min.js', array( 'jquery' ), '5.5.3', true );
    
    // Adding app file in the footer
    wp_enqueue_script( 'app-js', get_template_directory_uri() . '/assets/js/vendor/app.min.js', array( 'jquery' ), '', true );

    // Adding offcanvas file in the footer
    wp_enqueue_script( 'offcanvas-js', get_template_directory_uri() . '/assets/js/vendor/offcanvas.min.js', array( 'jquery' ), '', true );
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('app-js', 'offcanvas-js');
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);