<?php
/**
 *  Practice Area within the Content Grid
 * 
 *  These are loaded in as CARDS
 *  
 */

$the_fields = get_fields($post->ID);

$return['practice_area'] = '';

$guide['practice_area'] = '
    <li>
        <a href="%s" title="View more about %s">
            <div class="card vert mixed">
                <div class="content">
                    %s
                    %s
                </div>
                <div class="bgimg bgimg-zooms">
                    <div class="bgimg-img" style="background-image: url(%s)"></div>
                </div>
            </div>
        </a>
    </li>
';
$return['practice_area'] = sprintf(
    $guide['practice_area']
    ,get_permalink($post->ID)
    ,$post->post_title
    ,'<h3><span>'.$post->post_title . '</span></h3>'
    ,$the_fields['excerpt']
    ,$the_fields['image']['url']
);

echo $return['practice_area'];
?>