<?php 
/**
 * Template Name: Team Member
 * Template Post Type: team_members
 */
    $args = array(
        'post_type' => 'team_members'
        ,'posts_per_page' => 1
        ,'p' => $post->ID
    );
    $res = get_posts($args);

    $fields = get_fields($res->ID);

    $format_team_member = '
        <div>
            <div class="bgimg">
                <div class="bgimg-img" style="background-image: url(%s)"></div>
                <p>%s</p>
            </div>
            <p>%s</p>
            <div>
                %s
            </div>
        </div>
    ';
    
    $return_team_member = '<section class="teammember">';

    
    $return_team_member .= sprintf(
        $format_team_member
        ,$fields['headshot']['url']
        ,$res[0]->post_title
        ,$fields['position']
        ,$fields['bio']
    );
    $return_team_member .= '</section>';

    get_header();
?>
<main>
    <?php
        include( get_template_directory().'/sections/section.hero.php');

        echo $return_team_member;
    ?>
</main>
<?php 
    get_footer();
?>