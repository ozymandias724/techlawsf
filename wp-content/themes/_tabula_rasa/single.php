<?php
/**
 *  Practice Areas Single Post Template
 *      needs to be moved to a template file for cleanliness ?
 * 
 * 
 */

    $fields = get_fields( get_the_ID() );

    get_header();
 ?>
    <main>
        <?php

            // get hero
            include(get_template_directory() . '/parts/part.hero.php');

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

            include( get_template_directory().'/parts/part.signup-form.php');

        ?>
    </main>
<?php
/**
 * 
 */
    get_footer();
 ?>