<?php
/**
 *  Practice Areas Single Post Template
 *      needs to be moved to a template file for cleanliness ?
 * 
 * 
 */

$fields = get_fields( get_the_ID() );

$guide['practice_area_content'] = '
    <section class="practice_area">
        <div class="container normal anim__fade anim__fade-up">
            %s
        </div>
    <section>
';

$return['practice_area_content'] = sprintf(
    $guide['practice_area_content']
    ,$fields['details']
);

get_header();
?>
<main>
    <?php


    // get hero
    include(get_template_directory() . '/parts/part.hero.php');

    if (!empty($fields['content_blocks'])) {
        foreach ($fields['content_blocks'] as $cB) {

            $path = get_template_directory() . '/blocks/' . $cB['acf_fc_layout'] . '/' . '' . $cB['acf_fc_layout'] . '.php';
            // include the block
            if (file_exists($path)) {
                include($path);
            }
        }
    }
    // echo $return['practice_area_content'];


    ?>
</main>
<?php
get_footer();
?>