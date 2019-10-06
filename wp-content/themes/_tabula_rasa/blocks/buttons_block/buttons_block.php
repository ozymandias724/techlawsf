<?php
/**
*   Card Block
* 
*   1 or 2 column split vertically or horizonatally
*
*/

 wp_enqueue_style('buttonblock', get_template_directory_uri().'/blocks/buttons_block/buttons_block.css', 'main');

// return string
$return['buttons_block'] = '';
// return string
$return['buttons'] = '';

// open section and container
$return['buttons_block'] .= '
    <section class="site__block block__buttons">
        <div class="container ' . $cB['width'] . '">
        '. (!empty($cB['heading']) ? '<h2 class="block-heading">' . $cB['heading'] . '</h2>' : '') . '
        '. (!empty($cB['sub_heading']) ? '<p class="block-subheading">' . $cB['sub_heading'] . '</p>' : '') . '
';

// determine if we are supposed to use a set # of cols or a fluid #

// open buttons <ul>
$return['buttons'] .= '<div class="flexgrid '.( !empty($cB['column_count']) ? 'cols-'.$cB['column_count'] : '' ).'"><ul>';

// loop thru each column
foreach ($cB['buttons'] as $i => $button) {

    if( !empty($button['icon']) ){

        $return['buttons'] .= '
            <li class="anim__fade anim__fade-up">
                <a href="'.( !empty($button['link']['url']) ? ''.$button['link']['url'].'' : '' ).'" title="View">
                    '.( !empty($button['icon']) ? ''.$button['icon']->element.'' : '' ).'                    
                    '.( !empty($button['text']) ? '<p><span>'.$button['text'].'</span></p>' : '' ).'
                </a>
            </li>
        ';
    }
    else {

        $return['buttons'] .= '
            <li class="anim__fade anim__fade-up">
                <a class="button ghost" href="'.( !empty($button['link']['url']) ? ''.$button['link']['url'].'' : '' ).'" title="View">
                    '.( !empty($button['text']) ? $button['text'] : '' ).'
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

?>