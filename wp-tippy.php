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

//  Set default to no filters for the WP Role Filter feature
$wpRoleFilter = null;

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

    
    //  If WP Role Filter exists, then validate the filter
    if (isset($wpRoleFilter)) {
        $wpCurrentUser = wp_get_current_user();
        $wpCurrentUserID = get_current_user_id();
        $wpCurrentRole = $wpCurrentUser -> roles[0];
        if ($wpCurrentRole == 'admin' || $wpCurrentRole == 'administrator') {
            exit();
        }
        if ($wpCurrentRole == $wpRoleFilter) {
            echo "<script>
      		tippy('$elementID', $properties);
    		</script>";
        }
    }
    
    //  WP Role Filter unset, display for all users
    echo "<script>
      		tippy('$elementID', $properties);
    		</script>";
    
    //  Notify console for debugging purposes
    echo "<script>
            console.log('Tippy.js initiated');
            </script>";
    
    //  Send $elementID to console
    echo "<script>
            console.log('Tippy.js says: Element ID is $elementID');
            </script>";
}

function dismissPersistent($elementID) {
    global $wpdb;
    $result = $wpdb->query("DELETE * FROM wp_usermeta WHERE tippy_id = '$elementID' AND user_id = '$wpCurrentUserID'");
    return result;
}
?>
