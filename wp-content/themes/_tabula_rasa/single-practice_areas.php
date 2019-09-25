<?php
/**
 *  Practice Areas Single Post Template
 *      needs to be moved to a template file for cleanliness ?
 * 
 * 
 */

    $fields = get_fields( get_the_ID() );




    // if we have a page layout
    if( !empty( $fields['detail_view']['page_layout'] ) ){

        // set empty return string
        $return['page_layout'] = '';

        // loop thru the flexible content field
        foreach ($fields['detail_view']['page_layout'] as $i => $block) {

            // open each section
            $return['page_layout'] .= '<div class="'.$block['acf_fc_layout'].'">';
            
            $return['page_layout'] .= (!empty($block['heading']) ? '<h3 class="heading">'.$block['heading'].'</h3>' : '');
            $return['page_layout'] .= (!empty($block['sub_heading']) ? '<div class="subheading">'.$block['sub_heading'].'</div>' : '');
            
            // determine the fc type
            
            if( $block['acf_fc_layout'] == 'blurbs' ){

                $return['page_layout'] .= '<ul>';
                foreach( $block['blurbs'] as $blurb ){
                    $return['page_layout'] .= '<li><blockquote>'.$blurb['text'].'</blockquote></li>';
                }
                $return['page_layout'] .= '</ul>';
                
            }
            else if( $block['acf_fc_layout'] == 'features' ){
                $return['page_layout'] .= '<ul>';
                foreach( $block['features'] as $feature ){
                    $return['page_layout'] .= '<li><i class="far fa-circle"></i><span>'.$feature['text'].'</span></li>';
                }
                $return['page_layout'] .= '</ul>';

            }
            else if( $block['acf_fc_layout'] == 'copy' ){
                $return['page_layout'] .= '<div class="copy">'.$block['copy'].'</div>';

            }
            
            // close each div
            $return['page_layout'] .= '</div>';
        }
    }
        
        
        
    $guide['practice_area_content'] = '
        <section class="practice_area">
            <div class="container wide anim__fade anim__fade-up">
                %s
            </div>
        </section>
    ';

    $return['practice_area_content'] = sprintf(
        $guide['practice_area_content']
        // ,$fields['details']
        ,$return['page_layout']

    );

    get_header();
 ?>
    <main>
        <?php

            // get hero
            include(get_template_directory() . '/parts/part.hero.php');


            // echo page content
            echo $return['practice_area_content'];

            include( get_template_directory().'/parts/part.signup-form.php');

        ?>
    </main>
<?php
/**
 * 
 */
    get_footer();
 ?>