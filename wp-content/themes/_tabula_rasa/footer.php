<?php 
/**
 *      Footer
*/
?>
<footer>
    <div class="container normal">
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