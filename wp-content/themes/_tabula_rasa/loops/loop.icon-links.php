<?php 
/**
 *  Loop: Icon Links Repeater
 *      
 *  Returns an unordered list of icon links using the flexgrid
*/

if (empty($tS['icon_links'])) {
    $tS = get_fields('theme_settings', 'options');
}
if (empty($tS['icon_links'])) {
    // something went wrong; theres no clients!
} else {



    $guide['icon_links'] = '<li>%s</li>';

    $return['icon_links'] = '<ul>';
    foreach( $tS['icon_links'] as $iL ){

        $return['icon_links'] .= sprintf(
            $guide['icon_links']
            ,'X'
        );
        
    }
    $return['icon_links'] .= '</ul>';
    

    
    echo $return['icon_links'];
    

}
?>