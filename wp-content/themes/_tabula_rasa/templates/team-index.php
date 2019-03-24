<?php 
/**
 * Template Name: Our Team
 */

    $args = array(
        'post_type' => 'team_members'
        ,'posts_per_page' => -1
    );
    $res = get_posts($args);

    $format_team_members = '
        <li>
            <a href="%s" target="" title="">
                <div class="bgimg"><div class="bgimg-img" style="background-image: url(%s)"></div></div>
                <p><span>%s</span></p>
            </a>
        </li>
    ';

    
    $return_team_members = '
        <section class="ourteam">
            <div class="tr__image_grid">
                <ul class="tr__image_grid_images">'
    ;
    
    foreach( $res as $rec ){
        
        $fields = get_fields($rec->ID);
        
        $return_team_members .= sprintf(
            $format_team_members
            ,get_permalink($rec->ID)
            ,$fields['headshot']['url']
            ,$rec->post_title
        );
    }

    $return_team_members .= '</ul></div></section>';
    
    get_header();
?>
<main>

<?php 

    include( get_template_directory().'/sections/section.hero.php');

    echo $return_team_members;
 ?>
    
</main>
<?php 

    get_footer();

 ?>