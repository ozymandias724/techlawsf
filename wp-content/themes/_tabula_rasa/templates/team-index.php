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
        <li style="background-image: url(%s) ">
            <a href="%s" target="" title="">
                <p>%s</p>
            </a>
        </li>
    ';

    
    $return_team_members = '<section class="ourteam"><ul>';
    
    foreach( $res as $rec ){
        
        $fields = get_fields($rec->ID);
        
        $return_team_members .= sprintf(
            $format_team_members
            ,$fields['headshot']['url']
            ,get_permalink($rec->ID)
            ,$rec->post_title
        );
    }

    $return_team_members .= '</ul></section>';
    
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