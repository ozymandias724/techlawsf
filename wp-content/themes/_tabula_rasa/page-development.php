<?php
/**
 * Template: Page
 * 
 */

$fields = get_fields(get_the_ID());


get_header();
?>
<main>
    <?php

        // get hero
        include(get_template_directory() . '/parts/part.hero.php');
    ?>

<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <?php 
            for ($i=0; $i < 9; $i++) { 
                echo '<div class="swiper-slide"><img src="https://placekitten.com/800/600"><div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo blanditiis debitis ullam itaque molestiae, impedit doloremque ducimus soluta optio aut at hic dolores reiciendis repellat beatae possimus magnam vero eum.</div></div>';
            }
        ?>
    </div>
    
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    
</div>

</main>
<?php
get_footer();
?>
