<?php 
/**
 * Header Nav
 */

    if (has_nav_menu('footer')) {
        $args = array(
            'theme_location' => 'footer'
            ,'walker' => new Rational_Walker_Nav_Menu
            ,'echo' => false
            ,'container' => 'nav'
            ,'container_class' => 'navlinks'
        );
        echo wp_nav_menu($args);
    }
