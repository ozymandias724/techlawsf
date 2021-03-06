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

wp_enqueue_style('slick', get_template_directory_uri().'/blocks/__lib/slick/slick.css', 'main');
wp_enqueue_style('slick-theme', get_template_directory_uri().'/blocks/__lib/slick/slick-theme.css', 'main');
wp_enqueue_script( 'slick', get_template_directory_uri().'/blocks/__lib/slick/slick.min.js', 'main', '1.8.1', true);
// 
// wp_enqueue_style('bannerblock', get_template_directory_uri().'/blocks/banner_block/banner_block.css', 'main');
wp_enqueue_script( 'bannerblock', get_template_directory_uri().'/blocks/banner_block/banner_block.js', 'main', '1.0.0', true );

// return string
$return['banner_block'] = '';
// return string
$return['banner'] = '';

// open section and container
$return['banner_block'] .= '
    <section class="site__block block__banner '.$lightText.' '.$hasBg.'" '.$bgColor.'>
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

unset($bgColor, $hasBg, $lightText);
?>