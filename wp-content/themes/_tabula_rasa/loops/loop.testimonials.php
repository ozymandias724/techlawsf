<?php 
/**
 *  Loop: Testimonials
 *      
*/

    // expect data
    if( empty($fields['testimonials']['testimonials']) ){
        // if we dont have it, look where its expected
        $fields = get_fields( get_the_ID() );
    }
    // if we still have no data
    if( empty($fields['testimonials']['testimonials']) ){
        // something went wrong; theres no clients!
        // bail early
    } 
    // otherwise, we proceed as normal
    else {

        // set fields for this page to a semantic variable
        $pageFields = $fields['testimonials'];
        
        
        // guide string for a testimonial item
        $guide['testimonials'] = '
            <li class="testimonial js__testimonials">
                %s
            </li>
        ';

        
        // create this section
        $return['testimonials'] = '
            <section class="site__block testimonials">
                <div class="container ' . $pageFields['width'] . '">
                '. (!empty($pageFields['heading']) ? '<h2 class="block-heading">' . $pageFields['heading'] . '</h2>' : '') . '
                '. (!empty($pageFields['sub_heading']) ? '<p class="block-subheading">' . $pageFields['sub_heading'] . '</p>' : '') . '
                <div class="flexgrid cols-1"><ul>
        ';
        
        
        $count = 0;
        // loop the relationship field writing <li>
        foreach( $pageFields['testimonials'] as $testimonial ){
            $count++;
            // get the fields for the testimonial
            $postFields = get_fields($testimonial->ID);

            // guide string for the testimonial
            $guide['testimonial_posts'] = '
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
            $return['testimonial_posts'] .= sprintf(
                $guide['testimonial_posts']
                ,( $count % 2 ) ? 'anim__fade-left' : 'anim__fade-right'
                ,( !empty( $postFields['testimonial']['funding'] ) ? '<span>'.$postFields['testimonial']['funding'].'</span>' : '')
                ,( !empty( $postFields['testimonial']['testimonial'] ) ? '<blockquote>'.$postFields['testimonial']['testimonial'].'</blockquote>' : '')
                ,( !empty( $postFields['testimonial']['name'] ) ? '<h4>'.$postFields['testimonial']['name'].'</h4>' : '')
                ,( !empty( $postFields['testimonial']['position'] ) ? '<h6>'.$postFields['testimonial']['position'].'</h6>' : '')
            );
            
        }

        // write the concat. <li> back into the <div>
        $return['testimonials'] .= $return['testimonial_posts'];


        // close all the containers after the last <li> is written
        $return['testimonials'] .= '</ul></div></div></section>';
    
        // echo the finished section string
        echo $return['testimonials'];
    }
    unset($pageFields, $postFields);
?>