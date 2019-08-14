<?php
/* 
*   Blog Post item
*/

$the_fields = get_fields($post->ID);

$return['team_member'] = '';

$guide['team_member'] = '
    <a href="'.get_permalink($post->ID).'bio/" class="js__popup_bio">
        <div class="bgimg"><div class="bgimg-img" style="background-image: url(%s)"></div></div>
    </a>
';

if ($the_fields['status']) {

    $return['team_member'] = sprintf(
        $guide['team_member']
        ,$the_fields['picture']['url']
    );
}
echo $return['team_member'];

?>