<?php
/**
 * 
 * 
 * 
*/

$the_fields = get_fields($post->ID);

$return['team_member'] = '';

$guide['team_member'] = '
    <li class="anim__fade anim__fade-up">
        <a href="'.get_permalink($post->ID).'bio/" class="js__popup_bio" title="Read about '.$post->post_title.'">
            <div>
                <div class="bgimage"><div class="bgimage-img" style="background-image: url(%s)"></div></div>
                <div>
                    <h4>%s</h4>
                    <h5>%s</h5>
                </div>
            </div>
            <article>%s</article>
        </a>
    </li>
';

// 
if ($the_fields['status']) {

    $return['team_member'] = sprintf(
        $guide['team_member']
        ,$the_fields['picture']['url']
        ,$post->post_title
        ,$the_fields['position']
        ,$the_fields['excerpt']
    );
}

echo $return['team_member'];
//
?>