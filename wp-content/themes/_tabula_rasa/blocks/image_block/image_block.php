<?php 
/**
*  Image Block
* 
* 
*/
    // set return and guide string arrays
    $return['image_block'] = '';
    $guide['image_block'] = '';
    
    // guide string for the section
    $guide['image_block'] = '
        <section class="site__block block__image">
            <div class="container %s">
                <img src="%s">
            </div>
        </section>
    ';

    $return['image_block'] .= sprintf(
        $guide['image_block']
        ,( !empty( $cB['width'] ) ? $cB['width'] : '' )                                                         // container width
        ,$cB['image']['url']
    );


    // echo return string
    echo $return['image_block'];
