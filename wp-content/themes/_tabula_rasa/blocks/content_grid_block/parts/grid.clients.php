<?php
/**
 * 
 * 
 * 
*/

$the_fields = get_fields($post->ID);

$return['client_list'] = '';
// $guide['client_list'] = '
//     <li %s class="anim__fade anim__fade-up">
//         %s
//         <div class="info">
//             <div>
//                 %s
//                 %s
//             </div>
//             %s
//         </div>    
//         %s
//     </li>
// ';
$guide['client_list'] = '
    <li %s class="anim__fade anim__fade-up">
        %s
        <div class="info">
            %s
            %s
            %s
        </div>
    </li>
';

$terms = get_the_terms( $post, 'client_category' );

// $return['client_list'] .= sprintf(
//     $guide['client_list']
//     ,( !empty($terms) ? 'data-term="'.$terms[0]->slug.'"' : '' )
//     ,( !empty($terms) ? '<p class="category"><span>'.$terms[0]->name.'</span></p>' : '' )
//     ,( !empty($post->post_title) ? '<p class="name">'.$post->post_title.'</p>' : '' )
//     ,( !empty($the_fields['funding']) ? '<p class="funding">'.$the_fields['funding'].'</p>' : '' )
//     ,( !empty($the_fields['image']) ? '<div class="bgimage"><div class="bgimage-img" style="background-image: url('.$the_fields['image']['url'].')"></div></div>' : '' )
//     ,( !empty($the_fields['details']) ? '<div class="details">'.trim($the_fields['details']).'</div>' : '' )
// );
$return['client_list'] .= sprintf(
    $guide['client_list']
    ,( !empty($terms) ? 'data-term="'.$terms[0]->slug.'"' : '' )
    ,( !empty($the_fields['image']) ? '<div class="bgimage"><div class="bgimage-img" style="background-image: url('.$the_fields['image']['url'].')"></div></div>' : '' )
    ,( !empty($post->post_title) ? '<p class="name">'.$post->post_title.'</p>' : '' )
    ,( !empty($the_fields['funding']) ? '<p class="funding">'.$the_fields['funding'].'</p>' : '' )
    ,( !empty($the_fields['details']) ? '<div class="details">'.trim($the_fields['details']).'</div>' : '' )
);

// 

echo $return['client_list'];
// 
unset($return['client_list']);
//
?>