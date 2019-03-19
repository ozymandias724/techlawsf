<?php 
/**
 * Template Name: Practice Area
 * Template Post Type: practice_areas
 */
    $args = array(
        'post_type' => 'practice_areas'
        ,'posts_per_page' => 1
        ,'p' => $post->ID
    );
    $res = get_posts($args);

    $fields = get_fields($res->ID);

    $format_practice_area = '
        <div>
            <div class="bgimg">
                <div class="bgimg-img" style="background-image: url(%s)"></div>
                <p>%s</p>
            </div>
        </div>
    ';
    
    $return_practice_area = '<section class="practice_area">';

    $placeholder_img = get_template_directory_uri().'/library/img/profile-placeholder.png';
    
    $return_practice_area .= sprintf(
        $format_practice_area
        ,$placeholder_img
        ,$res[0]->post_title
    );
    $return_practice_area .= '</section>';

    get_header();
?>
<main>
    <?php
        include( get_template_directory().'/sections/section.hero.php');

        echo $return_practice_area;

        include( get_template_directory().'/modules/boxes.php');

    ?>
</main>
<?php 
    get_footer();
?>