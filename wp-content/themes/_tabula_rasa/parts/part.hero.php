<?php 
/**
 * HERO
 */

    $return['hero'] = '';
    
    if( !empty( $fields['hero']['use_hero'] ) ){


        
        $return['hero'] .= '<section class="hero" style="background-image: url('.$fields['hero']['image']['url']. ')"><div class="container normal">';


        $guide['hero'] = '
            %s
            %s
        ';
        
        $return['hero'] .= sprintf(
            $guide['hero']
            ,( !empty($fields['hero']['heading']) ? '<h2>'.$fields['hero']['heading'].'</h2>' : '' )
            ,( !empty($fields['hero']['sub_heading']) ? '<p>'.$fields['hero']['sub_heading'].'</p>' : '' )
        );
        
        
        $return['hero'] .= '</div></section>';
    }

    echo $return['hero'];
 ?>