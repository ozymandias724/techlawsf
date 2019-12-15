<?php
/**
 * 
 * 
 * 
*/

$the_fields = get_fields($post->ID);

$return['client_list'] = '';


$guide['client_list'] = '
    <li class="anim__fade anim__fade-up %s">
        %s
        <div class="info">
            %s
            %s
            %s
        </div>
    </li>
';

$terms = get_the_terms( $post, 'client_category' );


$return['client_list'] .= sprintf(
    $guide['client_list']
    ,$terms[0]->slug                            // raw filter value * used as a class *
    ,( !empty($the_fields['image']) 
        ? '<div class="bgimage"><div class="bgimage-img" style="background-image
        : url('.$the_fields['image']['url'].')"></div></div>' 
        : '' )                                  // bg image
    ,( !empty($post->post_title) 
        ? '<p class="name">'.$post->post_title.'</p>' 
        : '' )                                  // name
    ,( !empty($the_fields['funding']) 
        ? '<p class="funding">'.$the_fields['funding'].'</p>' 
        : '' )                                  // funding
    ,( !empty($the_fields['details']) 
        ? '<div class="details">'.trim($the_fields['details']).'</div>' 
        : '' )                                  // details 
);

// 

echo $return['client_list'];
// 
unset($return['client_list']);
//
?>