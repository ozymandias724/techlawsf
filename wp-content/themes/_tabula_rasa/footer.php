<?php 
    $footer_nav = wp_nav_menu(array(
        'echo' => false
        ,'walker' => new NavWalker()
        ,'theme_location' => 'footer'
    ));

?>
<footer>
    <?php 
        echo $footer_nav;
     ?>
</footer>
<?php
    // Do wp_footer
    if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
    ?> <script src="//localhost:35729/livereload.js"></script> <?php
    }
    wp_footer();
?>
</body>
</html>