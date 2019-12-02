<?php 
/**
*  Heading Content Block
* 
* 
*/

    $guide['slider_block'] = '
        <div>
            %$1s
        </div>
    ';
    
    // guide string for the section
    $return['slider_block'] = '<section class="site__block block__slider"><div class="container '.$cB['width'].'"><div>';

    foreach ($cB[''] as $i => $slide) {
        
        // return string for the section
        $return['slider_block'] .= sprintf(
            $guide['slider_block']
            ,$i
        );

    }
    
    $return['slider_block'] .= '</div></div></section>';

    // echo return string
    echo $return['slider_block'];
 ?>