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
    
    
    // if this is the front page...
    if( is_front_page() && !empty($fields['client_spotlight']['status']) ){
        
        include(get_template_directory() . '/parts/part.client-spotlight.php');

    }
    

    /**
     *  Loop thru the 'content blocks' flexible content field
     *  include template parts by name if they are available
     */
    if (!empty($fields['content_blocks'])) {
        foreach ($fields['content_blocks'] as $cB) {

            $path = get_template_directory() . '/blocks/' . $cB['acf_fc_layout'] . '/' . '' . $cB['acf_fc_layout'] . '.php';
            // include the block
            if (file_exists($path)) {
                include($path);
            }
        }
    }

    if( !is_page( 'contact' ) ){
        include( get_template_directory().'/parts/part.signup-form.php');
    }
    


    ?>
</main>
<?php
get_footer();
?>