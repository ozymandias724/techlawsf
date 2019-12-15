<?php 
/**
 *   Block
 * 
 *   Content Grid 
*/

// set return and guide strings
$return['content_grid'] = '';
$guide['content_grid'] = '';


// check relationship field has posts
if( !empty($cB['content']) ){

    // open section and container
    $return['content_grid'] .= '<section class="site__block block__content_grid"><div class="container '.$cB['options']['width'].'">';

    // if category filtering is enabled
    if( !empty($cB['options']['enable_filter']) ){
        $return['content_grid'] .= '<div class="filters">';
        ob_start();
        include('parts/filters.client_category.php');
        $return['content_grid'] .= ob_get_clean().'</div>';
    }
     

    // prepare records for a flexgrid
    $return['content_grid'] .= '<div class="flexgrid cols-'.$cB['options']['column_count'].'"><ul class="'.$cB['content'][0]->post_type.' '.$cB['options']['alignment'].'">';

    // loop thru the post results (items are post objects)
    foreach ($cB['content'] as $i => $post) {
        ob_start();
        include('parts/grid.'.$post->post_type.'.php');
        $return['content_grid'] .= ob_get_clean();
    }

    $return['content_grid'] .= '</ul></div>';

    // check for the view all button
    if( !empty( $cB['button'] ) ){
        $return['content_grid'] .= '<div class="viewall"><a class="button ghost anim__fade anim__fade-up" href="'.$cB['button']['url'].'">'.$cB['button']['title'].'</a></div>';
    }
    
    // close the content grid 
    $return['content_grid'] .= '</div></section>';

    echo $return['content_grid'];
}

unset($bgColor, $hasBg, $lightText);

?>