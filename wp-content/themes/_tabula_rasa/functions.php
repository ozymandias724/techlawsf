<?php 
/**
 * 
*/

include('classes/class.setup-theme.php');
include('classes/class.custom-posts.php');
include('includes/ext.acf.php');
include(get_template_directory() . '/classes/navwalker.php');



function do_custom_rewrite_rules(){
    add_rewrite_rule('^team_members/([^/]*)/bio/?', 'wp-content/themes/_tabula_rasa/parts/popup.bio.php?team_member=$1', 'top');
}
add_action('init', 'do_custom_rewrite_rules');






function get_iconlinks($field){
    $guide['icon_links'] = '<li class="iconlinks-icon"><a href="%s" title="">%s</a></li>';
    
    

    $return['icon_links'] = '<ul class="iconlinks">';
    foreach( $field['icon_links'] as $iL ){
        
        $return['icon_links'] .= sprintf(
            $guide['icon_links']
            ,'#'
            ,'<i class="'.$iL['icon']->class.'"></i>'
        );        
    }
    $return['icon_links'] .= '</ul>';
    return $return['icon_links'];
}



function get_nav_menu_name($location = ''){
    $theme_locations = get_nav_menu_locations();
    $menu_obj = get_term( $theme_locations[$location], 'nav_menu' );
    return $menu_obj->name;
}











//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


//   Set ACF map API key (examples below)
//       
//   acf free uses this:
//       add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
//       function my_acf_google_map_api($api)
//       {
//           $api['key'] = 'xxx';
//           return $api;
//       }
//       
//       
//   acf pro uses this
//       add_action('acf/init', 'set_maps_api_key');
//       function set_maps_api_key() {
//           acf_update_setting('google_api_key', 'AIzaSyBBX0KJ6MEzWrMPeH84FNUftS9KcAA9-g4');
//       }
//       
add_action('acf/init', 'set_maps_api_key');
function set_maps_api_key() {
    acf_update_setting('google_api_key', 'AIzaSyBBX0KJ6MEzWrMPeH84FNUftS9KcAA9-g4');

}



?>