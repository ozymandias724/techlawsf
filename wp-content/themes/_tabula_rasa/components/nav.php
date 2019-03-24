<?php 

    // get wordpress header nav menu
    $header_nav = wp_nav_menu(array(
        'echo' => false
        ,'walker' => new NavWalker()
        ,'theme_location' => 'primary'
    ));

    // get theme logo
    $logo_src = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' )[0];

    if ( has_custom_logo() ) {
        $format_logo_image = '<div class="bgimg"><div class="bgimg-img" style="background-image: url(%s)"></></div>';
        $return_logo_image = sprintf(
            $format_logo_image
            ,esc_url( $logo_src )
        );
    }
    
    $format_logo = '<a class="sitelogo" href="%s" title="">%s</a>';
    $return_logo = sprintf(
        $format_logo
        ,site_url()
        ,( has_custom_logo() ) ? $return_logo_image : '<span>'.get_bloginfo().'</span>'
    );
    $return_logo .= '';
    

?>
<header>
    <div>
        <?php 
            echo $return_logo;
            echo $header_nav;
        ?>
    </div>
</header>