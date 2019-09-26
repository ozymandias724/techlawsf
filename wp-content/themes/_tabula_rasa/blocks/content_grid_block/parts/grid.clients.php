<?php
/**
 * 
 * 
 * 
*/

$the_fields = get_fields($post->ID);

$return['client_list'] = '';
$guide['client_list'] = '
    <li class="grid_item" %s>
        %s
        <div class="info">
            <div>
                %s
                %s
            </div>
            %s
        </div>
        <div class="details">
            %s
        </div>
    </li>
';

$terms = get_the_terms( $post, 'client_category' );

$return['client_list'] .= sprintf(
    $guide['client_list']
    ,( !empty($terms) ? 'data-term="'.$terms[0]->slug.'"' : '' )
    ,( !empty($terms) ? '<p class="category"><span>'.$terms[0]->name.'</span></p>' : '' )
    ,( !empty($post->post_title) ? '<p class="name">'.$post->post_title.'</p>' : '' )
    ,( !empty($the_fields['funding']) ? '<p class="funding">'.$the_fields['funding'].'</p>' : '' )
    ,( !empty($the_fields['image']) ? '<div class="bgimg"><div class="bgimg-img" style="background-image: url('.$the_fields['image']['url'].')"></div></div>' : '' )
    ,( !empty($the_fields['details']) ? '<p>'.trim($the_fields['details']).'</p>' : '' )
);

// 

echo $return['client_list'];
// 
unset($return['client_list']);
//
?>