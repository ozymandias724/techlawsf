<?php 
/**
*  Copy Content Block
* 
* 
*/
    wp_enqueue_style('copyblock', get_template_directory_uri().'/blocks/copy_block/copy_block.css', 'main');

    // set return and guide string arrays
    $return['copy_block'] = '';
    $guide['copy_block'] = '';
    
    // guide string for the section
    $guide['copy_block'] = '
        <section class="site__block block__copy">
            <div class="anim__fade anim__fade-up container %s">
                %s
                %s
                %s
            </div>
        </section>
    ';

    $return['copy_block'] .= sprintf(
        $guide['copy_block']
        ,( !empty( $cB['width'] ) ? $cB['width'] : '' )// container width
        ,(!empty($cB['heading']) ? '<h2 class="block-heading anim__fade anim__fade-up">' . $cB['heading'] . '</h2>' : '')
        ,(!empty($cB['sub_heading']) ? '<p class="block-subheading anim__fade anim__fade-up">' . $cB['sub_heading'] . '</p>' : '')
        ,'<div>'.$cB['copy'].'</div>'
    );


    // echo return string
    echo $return['copy_block'];

    
 ?>