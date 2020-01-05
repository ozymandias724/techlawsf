<?php 
/**
*  Copy Content Block
* 
* 
*/
    // wp_enqueue_style('copyblock', get_template_directory_uri().'/blocks/copy_block/copy_block.css', 'main');

    // set return and guide string arrays
    $return['copy_block'] = '';
    $guide['copy_block'] = '';
    
    // guide string for the section
    $guide['copy_block'] = '
        <section class="site__block block__copy">
            <div class="anim__fade anim__fade-up container %s">
                %s
            </div>
        </section>
    ';

    $return['copy_block'] .= sprintf(
        $guide['copy_block']
        ,( !empty( $cB['width'] ) ? $cB['width'] : '' )// container width
        ,'<div>'.$cB['copy'].'</div>'
    );


    // echo return string
    echo $return['copy_block'];

    
 ?>