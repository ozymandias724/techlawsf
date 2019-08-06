<?php 
/**
 * Header Nav
*/

    $return['header'] = '<header class="header">';

    // if we have a nav
    if (has_nav_menu('header')) {
        
        // get nav
        $args = array(
            'theme_location' => 'header'
            ,'walker' => new Rational_Walker_Nav_Menu
            ,'echo' => false
            ,'container' => 'nav'
            ,'container_class' => 'navlinks'
        );
        // write nav
        $return['header'] .= wp_nav_menu($args);

    }

    // close header
    $return['header'] .= '</header>';

    echo $return['header'];
?>