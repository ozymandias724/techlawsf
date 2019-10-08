<?php
/**
 * 
 * 
 * 
*/

$the_fields = get_fields($post->ID);
if( !empty($the_fields) ){
    $the_fields = $the_fields['testimonial'];
}

$return['short_testimonial'] = '';
$guide['short_testimonial'] = '
    <li class="anim__fade anim__fade-up grid_item">
        <div>
            <div>
                %s
                %s
            </div>
        </div>
    </li>
';

$terms = get_the_terms( $post, 'client_category' );

$return['short_testimonial'] .= sprintf(
    $guide['short_testimonial']
    ,( !empty($the_fields['key_phrase']) ? '<p class="keyphrase">'.$the_fields['key_phrase'].'</p>' : '' )
    ,'' // we dont know if we can use their naaaaame
    // ,( !empty($the_fields['name']) ? '<div class="name">'.trim($the_fields['name']).'</div>' : '' )
);

// 

echo $return['short_testimonial'];
// 
unset($return['short_testimonial'], $the_fields);
//
?>