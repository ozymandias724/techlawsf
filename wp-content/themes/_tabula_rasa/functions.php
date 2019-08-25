<?php 
require('classes/class.setup-theme.php');
require('classes/class.cpts.php');
require('includes/ext.acf.php');
require(get_template_directory() . '/classes/navwalker.php');



function do_custom_rewrite_rules(){
    add_rewrite_rule('^team_members/([^/]*)/bio/?', 'wp-content/themes/_tabula_rasa/parts/popup.bio.php?team_member=$1', 'top');
}

add_action('init', 'do_custom_rewrite_rules');



/**
 *  Set ACF map API key
*/
    // acf free uses this:
    // add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
    // function my_acf_google_map_api($api)
    // {
    //     $api['key'] = 'AIzaSyBBX0KJ6MEzWrMPeH84FNUftS9KcAA9-g4';
    //     return $api;
    // }
/**
 *  /Set ACF map API key
*/
    
// acf pro uses this
add_action('acf/init', 'set_maps_api_key');
function set_maps_api_key() {
    acf_update_setting('google_api_key', 'AIzaSyBBX0KJ6MEzWrMPeH84FNUftS9KcAA9-g4');

}



?>