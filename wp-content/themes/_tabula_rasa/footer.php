<?php 
/**
 *      Footer
*/

    // get theme settings
    $tS = get_field('theme_settings', 'options');
    
    // get the address
    // (acf extension)
    $return['address'] = ( !empty($tS['address']) ? get_the_address($tS['address']) : '' );

    // get the site custom logo or site name
    $return['logo'] = '';
    if( has_custom_logo() ){
        $return['logo'] = get_custom_logo();
    } else {
        $return['logo'] = '<a href="'.site_url().'" title="Visit '.get_bloginfo( 'name' ).' home page"><div class="logo logo--text">'.get_bloginfo('name').'</div></a>';
    }


    if (has_nav_menu('footer')) {
        $args = array(
            'theme_location' => 'footer'
            ,'walker' => new Rational_Walker_Nav_Menu
            ,'echo' => false
            ,'container' => 'nav'
            ,'container_class' => 'navlinks'
        );
        $return['footer_nav'] = wp_nav_menu($args);
    } else {
        $return['footer_nav'] = '';
    }
    
    ob_start();
    include( get_template_directory() . '/loops/loop.icon-links.php' );
    $return['footer_social'] = ob_get_clean();
    
    
    
    $return['footer'] = '';
    $guide['footer'] = '
            <div class="container wide">
                <section>
                    %s
                    %s
                </section>                
                <section class="footer-contactus">
                    <h4>Contact Us</h4>
                    %s
                    %s
                    %s
                </section>
                <section>
                    %s
                </section>
            </div>
    ';
    $return['footer'] = sprintf(
        $guide['footer']
        ,$return['logo']
        ,$return['address']
        ,( !empty($tS['phone_number']) ? '<p><a href="'.$tS['phone_number'].'" title="Call '.$tS['phone_number'].'">'.$tS['phone_number'].'</a></p>' : '' ) // phone
        ,( !empty($tS['email_address']) ? '<p><a href="'.$tS['email_address'].'" title="Email '.$tS['email_address'].'">'.$tS['email_address'].'</a></p>' : '' ) // phone
        ,$return['footer_social']
        ,$return['footer_nav'] // nav
    );
    
?>
<footer class="footer">
<?php 

    // footer content
    echo $return['footer'];



    if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
        echo '<script src="//localhost:35729/livereload.js"></script>';
    }

    // wp footer scripts etc
    wp_footer();
?>
</footer>
</body>
</html>