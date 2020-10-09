<?php

/*
Plugin Name: WP Tippy
Plugin URI: https://github.com/Lazul-Agency/wp-tippy
Description: Wordpress plugin to implement custom tooltips, based on the Tippy.js and Popper.js frameworks.
Author: Lazul Agency
Author URI: https://lazul.agency/
Version: 1.2.4
License: MIT
*/

//  Enqueue the necessary Tippy.js and Popper.js scripts for DEVELOPMENT ENVIRONMENT
wp_enqueue_script('tippy', 'https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js');
wp_enqueue_script('popper', 'https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js');

/*  OR

    Enqueue the necessary Tippy.js and Popper.js scripts for PRODUCTION ENVIRONMENT
wp_enqueue_script('tippy', 'https://unpkg.com/tippy.js@6');
wp_enqueue_script('popper', 'https://unpkg.com/@popperjs/core@2');

*/

/*  Create a Tippy.js instance, where both $elementID and $options are required parameters:
    @param String $elementID – The ID of the DOM element to which you'd like to attach a tooltip
    @param mixed[] $properties – The array of properties to customize the instance, as detailed at: https://atomiks.github.io/tippyjs/v6/all-props/
*/

function createTippyInstance($elementID, $properties) {
  echo "<script>
      		tippy('$elementID', $properties);
    		</script>";
}
?>
