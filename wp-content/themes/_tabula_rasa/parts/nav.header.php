<?php 
/**
 * Header Nav
 */

    //  declare array of return strings
    $return = ['header'];

    $return['header'] = '<header class="header '.( !empty($hS['fade_in']) ? 'fadein' : '' ).' '.$hS['type'].'"><div class="container wide">';


    //      !!! TBD, replace this with a SVG inline code solution
    // 
    // if there is a custom logo, use that
    if( has_custom_logo( ) ){
        $return['header'] .= 'Header Image Plz';
    }
    // if there is no custom logo, use the site title
    else {
        $return['header'] .= '<a href="'.site_url().'"><div class="logo logo--text">'.get_bloginfo('name').'</div></a>';
    }
    

    // if we have a nav
    if (has_nav_menu('header')) {
        
        // get nav
        $args = array(
            'theme_location' => 'header'
            ,'walker' => new Tabula_Rasa_Nav_Menu
            ,'echo' => false
            ,'container' => 'nav'
            ,'container_class' => 'navlinks'
            ,'link_before' => '<span>'
            ,'link_after' => '</span>'
        );
        // write nav
        $return['header'] .= '<div class="navicons"><i class="fas fa-bars"></i><i class="fas fa-times"></i></div>';
        $return['header'] .= wp_nav_menu($args);
    }

    // close header
    $return['header'] .= '</div></header>';

    echo $return['header'];


    // clean up
    unset($return);
?>