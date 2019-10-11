<?php 

class cpts
{
    function __construct(){
        add_action('init', array($this, 'register_cpts'));
    }
    function register_cpts(){

        // 
        // 
         $labels = array(
            'name' => __('Clients', 'theme'), // Rename these to suit
            'singular_name' => __('Client', 'theme'),
            'add_new' => __('Add New', 'theme'),
            'add_new_item' => __('Add New Client', 'theme'),
            'edit' => __('Edit', 'theme'),
            'edit_item' => __('Edit Client', 'theme'),
            'new_item' => __('New Client', 'theme'),
            'view' => __('View Client', 'theme'),
            'view_item' => __('View Client', 'theme'),
            'search_items' => __('Search Clients', 'theme'),
            'not_found' => __('No Clients found', 'theme'),
            'not_found_in_trash' => __('No Clients found in Trash', 'theme')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'has_archive' => false,
            'menu_position' => null,
        );
        register_post_type('clients', $args);
        register_taxonomy('client_category', 'clients', array(
            'label' => 'Client Category'
            ,'hierarchical' => true
        ));

        // 
        // 
        // 
        $labels = array(
            'name' => __('Testimonials', 'theme'), // Rename these to suit
            'singular_name' => __('Testimonial', 'theme'),
            'add_new' => __('Add New', 'theme'),
            'add_new_item' => __('Add New Testimonial', 'theme'),
            'edit' => __('Edit', 'theme'),
            'edit_item' => __('Edit Testimonial', 'theme'),
            'new_item' => __('New Testimonial', 'theme'),
            'view' => __('View Testimonial', 'theme'),
            'view_item' => __('View Testimonial', 'theme'),
            'search_items' => __('Search Testimonials', 'theme'),
            'not_found' => __('No Testimonials found', 'theme'),
            'not_found_in_trash' => __('No Testimonials found in Trash', 'theme')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'has_archive' => false,
            'menu_position' => null,
        );
        register_post_type('testimonials', $args);
        
        // 
        // 
        // 

        register_taxonomy('department', 'team_members', array(
            'label' => 'Departments'
            ,'hierarchical' => true
        ));
        // labels for department taxonomy
        $labels = array(
            'name' => __('Team Members', 'theme'), // Rename these to suit
            'singular_name' => __('Team Member', 'theme'),
            'add_new' => __('Add New', 'theme'),
            'add_new_item' => __('Add New Team Member', 'theme'),
            'edit' => __('Edit', 'theme'),
            'edit_item' => __('Edit Team Member', 'theme'),
            'new_item' => __('New Team Member', 'theme'),
            'view' => __('View Team Member', 'theme'),
            'view_item' => __('View Team Member', 'theme'),
            'search_items' => __('Search Team Members', 'theme'),
            'not_found' => __('No Team Members found', 'theme'),
            'not_found_in_trash' => __('No Team Members found in Trash', 'theme')
        );
        // args for department taxonomy
        $args = array(
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'has_archive' => false,
            'menu_position' => null,
        );
        register_post_type('team_members', $args);

        // 
        // 
        // 

        $labels = array(
            'name' => __('Practice Areas', 'theme'), // Rename these to suit
            'singular_name' => __('Practice Area', 'theme'),
            'add_new' => __('Add New', 'theme'),
            'add_new_item' => __('Add New Practice Area', 'theme'),
            'edit' => __('Edit', 'theme'),
            'edit_item' => __('Edit Practice Area', 'theme'),
            'new_item' => __('New Practice Area', 'theme'),
            'view' => __('View Practice Area', 'theme'),
            'view_item' => __('View Practice Area', 'theme'),
            'search_items' => __('Search Practice Areas', 'theme'),
            'not_found' => __('No Practice Areas found', 'theme'),
            'not_found_in_trash' => __('No Practice Areas found in Trash', 'theme')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'has_archive' => false,
            'menu_position' => null,
        );
        register_post_type('practice_areas', $args);
        
        // 

    }
}
new cpts();
?>