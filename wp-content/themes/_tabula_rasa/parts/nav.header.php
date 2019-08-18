<?php 
/**
 * Header Nav
*/

    $return['header'] = '<header class="header"><div class="container wide">';


    if( has_custom_logo( ) ){

        $return['header'] .= 'Header Image Plz';

    } else {

        $return['header'] .= '<a href="'.site_url().'"><div class="logo logo--text">'.get_bloginfo('name').'</div></a>';
        
    }
    

    // if we have a nav
    if (has_nav_menu('header')) {
        
        // get nav
        $args = array(
            'theme_location' => 'header'
            ,'walker' => new Rational_Walker_Nav_Menu
            ,'echo' => false
            ,'container' => 'nav'
            ,'container_class' => 'navlinks'
            ,'link_before' => '<span>'
            ,'link_after' => '</span>'
        );
        // write nav
        $return['header'] .= wp_nav_menu($args);

    }

    // close header
    $return['header'] .= '</div></header>';

    echo $return['header'];
?>