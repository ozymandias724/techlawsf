<?php 
/**
 * 	Setup The Theme
 */
class SetupTheme
{
	public static function _init(){

        // 
        SetupTheme::clean_head();
        // 
        add_action( "after_setup_theme", "SetupTheme::after_setup_theme");
        // 
        add_action(" init", "SetupTheme::init" );
        // 
		add_action( 'wp_enqueue_scripts', 'SetupTheme::wp_enqueue_scripts');
        // 
    }
	// 
	public static function after_setup_theme(){
		add_theme_support( 'html5' );
		add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo' );

        register_nav_menus(array(
            'header' => 'Header Nav'
            ,'footer' => 'Footer Nav'
        ));
	}
	// 
	public static function init(){
        add_post_type_support( 'page', 'excerpt' );
	}


	// Enqueue Scripts (hook)
	public static function wp_enqueue_scripts(){
	    SetupTheme::register_javascript();
	    SetupTheme::enqueue_javascript();
	    SetupTheme::register_styles();
	    SetupTheme::enqueue_styles();
	}

    /**
     * register javascript
     *
     * @return void
     */
	public static function register_javascript(){

        // wp_deregister_script('jquery');
        
	    wp_register_script( 'main'
	    	, get_template_directory_uri() . '/__build/_js/main.js'
	    	, array()
            , filemtime(get_template_directory() . '/__build/_js/main.js')
            , true
    	);
    }

	public static function register_styles(){
	    wp_register_style( 'main'
	    	, get_template_directory_uri() . '/__build/_css/main.css'
            , false
	    	, filemtime(get_template_directory() . '/__build/_css/main.css')
        );   
    }
    
	// 
	public static function enqueue_javascript(){
	    wp_enqueue_script( 'main' );
	}
	public static function enqueue_styles(){
        wp_enqueue_style( 'main' );
	}

	// remove junk from the header
	public static function clean_head(){

        remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
        remove_action('wp_head', 'wp_generator'); // remove wordpress version
        remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
        remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
        remove_action('wp_head', 'index_rel_link'); // remove link to index page
        remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
        remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
        remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink
        remove_action( 'wp_head', 'wp_resource_hints', 2 );
        remove_action('wp_print_styles', 'print_emoji_styles');

        // 
        add_filter( 'show_admin_bar', '__return_false' );
	    add_filter( 'emoji_svg_url', '__return_false' );
        // 
	    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	}
}
SetupTheme::_init();