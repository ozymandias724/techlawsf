<?php
/**
 * 
 * 
 * 
*/

$the_fields = get_fields($post->ID);

if( is_page_template( 'templates/testimonials.php' ) ){

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
        <hr>
    ';

    // write the testimonial content (inside <li>)
    $return['long_testimonial'] .= sprintf(
        $guide['long_testimonial']
        ,( $i % 2 ) ? 'anim__fade-left' : 'anim__fade-right'
        ,( !empty( $the_fields['testimonial']['key_phrase'] ) ? '<span>'.$the_fields['testimonial']['key_phrase'].'</span>' : '')
        ,( !empty( $the_fields['testimonial']['testimonial'] ) ? '<blockquote>'.$the_fields['testimonial']['testimonial'].'</blockquote>' : '')
        ,( !empty( $the_fields['testimonial']['name'] ) ? '<h4>'.$the_fields['testimonial']['name'].'</h4>' : '')
        ,( !empty( $the_fields['testimonial']['position'] ) ? '<h6>'.$the_fields['testimonial']['position'].'</h6>' : '')
    );

    echo $return['long_testimonial'];

}
else {

    $return['short_testimonial'] = '';

    $guide['short_testimonial'] = '
        <li class="anim__fade anim__fade-up grid_item">
            <div>
                <div>
                    %s
                </div>
            </div>
        </li>
    ';
    
    $return['short_testimonial'] .= sprintf(
        $guide['short_testimonial']
        ,( !empty($the_fields['testimonial']['key_phrase']) ? '<p class="keyphrase">'.$the_fields['testimonial']['key_phrase'].'</p>' : '' )
    );
    
    echo $return['short_testimonial'];
    
}


?>