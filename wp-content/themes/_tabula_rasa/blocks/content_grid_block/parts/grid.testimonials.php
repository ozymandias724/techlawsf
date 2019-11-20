<?php
/**
 * 
 * 
 * 
*/

$the_fields = get_fields($post->ID);

    $return['long_testimonial'] = '';
    // get the fields for the testimonial

    // guide string for the testimonial
    $guide['long_testimonial'] = '
        <li class="testimonial anim__fade %s">
            <div>
                %s
                %s
            </div>
            <div>
                %s
                %s
            </div>
        </li>
    ';

    // write the testimonial content (inside <li>)
    $return['long_testimonial'] .= sprintf(
        $guide['long_testimonial']
        ,( $i % 2 ) ? 'anim__fade-left' : 'anim__fade-right'
        ,( !empty( $the_fields['testimonial']['key_phrase'] ) ? '<h3 class="keyphrase">'.$the_fields['testimonial']['key_phrase'].'</h3>' : '')
        ,( !empty( $the_fields['testimonial']['testimonial'] ) ? '<div>'.$the_fields['testimonial']['testimonial'].'</div>' : '')
        ,( !empty( $the_fields['testimonial']['name'] ) ? '<span class="name">'.$the_fields['testimonial']['name'].'</span>' : '')
        ,( !empty( $the_fields['testimonial']['position'] ) ? '<span class="position">'.$the_fields['testimonial']['position'].'</span>' : '')
    );

    echo $return['long_testimonial'];



?>