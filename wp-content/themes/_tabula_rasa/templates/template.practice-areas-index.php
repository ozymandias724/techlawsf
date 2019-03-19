<?php 
/**
 * Template Name: Practice Areas Index
 */

    $args = array(
        'post_type' => 'practice_areas'
        ,'posts_per_page' => -1
    );
    $res = get_posts($args);


    $format_practice_area = '
        <li style="background-image: url(%s)">
            <a href="%s" title="" target="">
                <p>%s</p>
            </a>
        </li>
    ';
    $return_practice_areas = '<section class="practiceareas"><ul>';
    
    foreach( $res as $rec ){
        
        $fields = get_fields($rec->ID);
        
        
        $return_practice_areas .= sprintf(
            $format_practice_area
            ,$fields['image']['url']
            ,get_permalink($rec->ID)
            ,$rec->post_title
        );
        
    }
    
    $return_practice_areas .= '</ul></section>';
    
    get_header();
 
?>

<main>
    <?php 
       include( get_template_directory().'/sections/section.hero.php');
       echo $return_practice_areas;
       include( get_template_directory().'/modules/boxes.php');
     ?>
</main>

<?php 
   get_footer();
 ?>