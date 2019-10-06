<?php
/**
*   Card Block
* 
*   1 or 2 column split vertically or horizonatally
*
*/

 wp_enqueue_style('bannerblock', get_template_directory_uri().'/blocks/banner_block/banner_block.css', 'main');

// return string
$return['banner_block'] = '';
// return string
$return['banner'] = '';

// open section and container
$return['banner_block'] .= '
    <section class="site__block block__banner">
        <div class="container ' . $cB['width'] . '">
';

// determine if we are supposed to use a set # of cols or a fluid #

// open banner <ul>
$return['banner'] .= '<div class="flexgrid '.( isset($cB['column_count']) ? 'cols-'.$cB['column_count'] : '' ).'"><ul>';

// loop thru each column
foreach ($cB['images'] as $i => $image) {

    $return['banner'] .= '<li class="anim__fade anim__fade-up"><img src="'.$image['url'].'" alt="'.(!empty($image['alt']) ? $image['alt'] : '').'"></li>';
    
}
// close column container
$return['banner'] .= '</ul></div>';

// write banner into section
$return['banner_block'] .= $return['banner'];

// close and echo the section
echo $return['banner_block'] . '</div></section>';

?>