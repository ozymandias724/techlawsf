<?php 

class cpts
{
    function __construct(){
        add_action('init', array($this, 'register_cpts'));
    }
    function register_cpts(){
        $this->register_practice_areas();
        $this->register_team_members();
    }

    function register_team_members(){
        register_taxonomy('department', 'team_members', array(
            'label' => 'Departments'
            ,'hierarchical' => true
        ));
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
        $args = array(
            'labels' => $labels,
            'public' => true,
            'hierarchical' => false,
            'has_archive' => false,
            'menu_position' => null,
        );
        register_post_type('team_members', $args);
    }
    function register_practice_areas(){
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
    }
}

$cpts = new cpts();
?>