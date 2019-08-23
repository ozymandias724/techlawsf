<?php 
/**
 *      Footer
*/

    // get theme settings
    $tS = get_field('theme_settings', 'options');
    
    // addr
    if( !empty($tS['address']) ){
        $address = get_the_address($tS['address']);
    }

    
?>
<footer>
    <div class="container wide">
        
        
        
        <div>
            <h4>Tech Law SF Group Inc</h4>
            <?php echo $address; ?>
        </div>
    
        
        <div>
            <h4>Contact Us</h4>
            <?php 
                echo $tS['phone_number'];
                echo $tS['email_address'];
                include( get_template_directory() . '/loops/loop.icon-links.php' );

            ?>
        </div>
    
    
        <?php 

            include( get_template_directory() . '/parts/nav.footer.php');
        ?>

        
    </div>
    <?php 
        if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
            echo '<script src="//localhost:35729/livereload.js"></script>';
        }
        wp_footer();
    ?>
</footer>
</body>
</html>