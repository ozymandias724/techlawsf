<?php 
/**
 * Template Name: HomePage
 */
    get_header();
 ?>
<main>
    <?php 
        include( get_template_directory().'/sections/section.hero.php');
        include( get_template_directory().'/sections/section.boxes.php');
     ?>
</main>
<?php 
    get_footer();
 ?>