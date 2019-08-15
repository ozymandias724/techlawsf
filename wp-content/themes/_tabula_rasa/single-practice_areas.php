<?php
/**
 *  Practice Areas Single Post Template
 * 
 */

$fields = get_fields( get_the_ID() );

$guide['practice_area_content'] = '
    <section class="practice_area">
        <div class="container normal">
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

    echo $return['practice_area_content'];


    ?>
</main>
<?php
get_footer();
?>