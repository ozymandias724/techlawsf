<?php 
/**
 *      Footer
*/

    $settings = get_field('theme_settings', 'options');

    
    
?>
<footer>
    <div class="container wide">
        
        
        
        <div>
            <h4>Tech Law SF Group Inc</h4>
        </div>
    
        
        <div>
            <h4>Contact Us</h4>
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