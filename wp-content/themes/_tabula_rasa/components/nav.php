<?php 

$header_nav = wp_nav_menu(array(
    'echo' => false
    ,'walker' => new NavWalker()
    ,'theme_location' => 'primary'
));


$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo_src = wp_get_attachment_image_src( $custom_logo_id , 'full' )[0];
$logo = ( has_custom_logo() ) ? '<a href="'.site_url().'" title="" class="logo"><div class="logo-image" style="background-image: url('.esc_url( $logo_src ).')"></div></a>' : '';

?>
<header>
    <?php 
        echo $logo;
        echo $header_nav;
     ?>
</header>