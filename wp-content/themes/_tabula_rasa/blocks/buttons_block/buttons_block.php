<?php
/**
*   Card Block
* 
*   1 or 2 column split vertically or horizonatally
*
*/
    // start extras experimental ***
    //  

    if( !empty($cB['block_extras']) ){
        $bgColor = ( !empty($cB['block_extras']['background_color']) ? 'style="background-color: '.$cB['block_extras']['background_color'].';"' : '' );
        $hasBg = ( !empty($cB['block_extras']['background_color']) ? 'block__has-bg' : '' );
        $lightText = ( !empty($cB['block_extras']['text_color']) ? 'block__light-text' : '' );
    }
    
    //  
    // end extras experimental ***
//  wp_enqueue_style('buttonblock', get_template_directory_uri().'/blocks/buttons_block/buttons_block.css', 'main');

// return string
$return['buttons_block'] = '';
// return string
$return['buttons'] = '';

// open section and container
$return['buttons_block'] .= '
    <section class="site__block block__buttons '.$lightText.' '.$hasBg.'" '.$bgColor.'>
        <div class="container ' . $cB['width'] . '">
';

// determine if we are supposed to use a set # of cols or a fluid #

// open buttons <ul>
$return['buttons'] .= '<div class="flexgrid '.( !empty($cB['column_count']) ? 'cols-'.$cB['column_count'] : '' ).'"><ul>';

// loop thru each column
foreach ($cB['buttons'] as $i => $button) {



    // image if we have one
    if( !empty($button['image']) ){

        $return['buttons'] .= '
            <li class="anim__fade anim__fade-up">
                <a href="'.( !empty($button['link']['url']) ? ''.$button['link']['url'].'' : '' ).'" title="View">
                    '.( !empty($button['image']['url']) ? '<img src="'.$button['image']['url'].'" alt="">' : '' ).'
                    '.( !empty($button['text']) ? '<p><span>'.$button['text'].'</span></p>' : '' ).'
                </a>
            </li>
        ';
    }
    // otherwise use the icon
    else if( !empty($button['icon']) ){

        $return['buttons'] .= '
            <li class="anim__fade anim__fade-up">
                <a href="'.( !empty($button['link']['url']) ? ''.$button['link']['url'].'' : '' ).'" title="View">
                    '.( !empty($button['icon']) ? ''.$button['icon']->element.'' : '' ).'                    
                    '.( !empty($button['text']) ? '<p><span>'.$button['text'].'</span></p>' : '' ).'
                </a>
            </li>
        ';
    }
    // if no image or icon, then its a normal button
    else {


        $return['buttons'] .= '
            <li class="anim__fade anim__fade-up">
                <a class="button ghost" href="'.( !empty($button['link']['url']) ? ''.$button['link']['url'].'' : '' ).'" title="View">
                    '.( !empty($button['text']) ? $button['text'] : $button['link']['title'] ).'
                </a>
            </li>
        ';
    }
    
}
// close column container
$return['buttons'] .= '</ul></div>';

// write buttons into section
$return['buttons_block'] .= $return['buttons'];

// close and echo the section
echo $return['buttons_block'] . '</div></section>';

unset($bgColor, $hasBg, $lightText);
?>