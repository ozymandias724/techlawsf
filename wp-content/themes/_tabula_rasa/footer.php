<?php 
/**
 *      Footer
*/

    // get theme settings
    $tS = get_field('theme_settings', 'options');
    
    // get the address
    // (acf extension)
    $return['address'] = ( !empty($tS['address']) ? '<a href="#" title="">'.get_the_address($tS['address']).'</a>' : '' );

    // get the site custom logo or site name
    // $return['logo'] = '';
    // if( has_custom_logo( ) ){
    //     $logo_src = wp_get_attachment_image_src(  get_theme_mod( 'custom_logo' ) , 'full' )[0];
    //     $return['logo'] .= '<a href="'.site_url().'" title="'.get_bloginfo('name').'" class="logo logo--image"><img src="'.$logo_src.'"></a>';
    // }
    // else {
    //     $return['logo'] = '<a href="'.site_url().'" title="Visit '.get_bloginfo( 'name' ).' home page"><h3><span>'.get_bloginfo('name').'</span></h3></a>';
    // }
    $return['logo'] = '<a href="'.site_url().'" title="Visit '.get_bloginfo( 'name' ).' home page"><h3><span>'.get_bloginfo('name').'</span></h3></a>';

    // 
    $return['footer_nav'] = '';
    // 
    if (has_nav_menu('footer_1')) {
        
        $return['footer_nav'] .= '<section class="anim__fade anim__fade-up"><h3><span>'.get_nav_menu_name('footer_1').'</span></h3>';
        
        $args = array(
            'theme_location' => 'footer_1'
            ,'walker' => new Tabula_Rasa_Nav_Menu
            ,'echo' => false
            ,'container' => 'nav'
            ,'container_class' => 'navlinks'
            ,'link_before' => '<span>'
            ,'link_after' => '</span>'
        );
        // write the nav
        $return['footer_nav'] .= wp_nav_menu($args);
        $return['footer_nav'] .= '</section>';
    }
    
    if (has_nav_menu('footer_2')) {
        $return['footer_nav'] .= '<section class="anim__fade anim__fade-up"><h3><span>'.get_nav_menu_name('footer_2').'</span></h3>';
        $args = array(
            'theme_location' => 'footer_2'
            ,'walker' => new Tabula_Rasa_Nav_Menu
            ,'echo' => false
            ,'container' => 'nav'
            ,'container_class' => 'navlinks'
            ,'link_before' => '<span>'
            ,'link_after' => '</span>'
        );
        // write the nav
        $return['footer_nav'] .= wp_nav_menu($args);
        $return['footer_nav'] .= '</section>';
    }
    
    
    $return['footer'] = '';
    $guide['footer'] = '
            <div class="container wide">
                <section class="anim__fade anim__fade-up">
                    %s
                    %s
                </section>                
                <section class="anim__fade anim__fade-up footer-contactus">
                    <h3><span>Contact Us</span></h3>
                    %s
                    %s
                    %s
                </section>
                %s
            </div>
    ';
    $return['footer'] = sprintf(
        $guide['footer']
        ,$return['logo']
        ,$return['address']
        ,( !empty($tS['phone_number']) ? '<p><a href="'.$tS['phone_number'].'" title="Call '.$tS['phone_number']. '"><i class="fas fa-phone"></i><span>'.$tS['phone_number']. '</span></a></p>' : '' ) // phone
        ,( !empty($tS['email_address']) ? '<p><a href="'.$tS['email_address'].'" title="Email '.$tS['email_address']. '"><i class="far fa-envelope"></i><span>'.$tS['email_address']. '</span></a></p>' : '' ) // phone
        ,get_iconlinks($tS)
        ,$return['footer_nav'] // nav
    );
    
?>
<footer class="footer">
    
<?php 

    // footer content
    echo $return['footer'];

    // wp footer scripts etc
    if( in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')) && !is_admin() ){ echo '<script src="http://localhost:35729/livereload.js"></script>'; }
    wp_footer();
?>
</footer>
</body>
</html>