<?php
/**
 * 
 * 
 * 
*/

$the_fields = get_fields($post->ID);

$return['team_member'] = '';

$guide['team_member'] = '
    <li>
        <a href="'.get_permalink($post->ID).'bio/" class="js__popup_bio" title="Read about '.$post->post_title.'">
            <div class="bgimg"><div class="bgimg-img" style="background-image: url(%s)"></div></div>
            <div>
                <p>%s</p>
                <p>%s</p>
            </div>
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
    );
}

echo $return['team_member'];
//
?>