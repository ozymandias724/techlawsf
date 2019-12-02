<?php 
/**
 *   Block
 * 
 *   Content Grid 
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

// wp_enqueue_style('contentgrid', get_template_directory_uri().'/blocks/content_grid_block/content_grid_block.css', 'main');

if( !empty($cB) ){
    
}
if( !empty($cB) && $cB['acf_fc_layout'] == 'content_grid_block' ){
    
	$return['content_grid'] = '';
    $guide['content_grid'] = '';

	// verify there are records in the relationship field
	if( !empty($cB['content']) ){

        // open up a section,
        // open up container inside section
        $return['content_grid'] .= '<section class="site__block block__content_grid '.$lightText.' '.$hasBg.'" '.$bgColor.'><div class="container '.$cB['options']['width'].'">';

        // check for the heading,
        if( !empty( $cB['heading'] ) ){
            $return['content_grid'] .= '<h2 class="anim__fade anim__fade-up">'.$cB['heading'].'</h2>';
        }
        
        // check for the sub heading
        if( !empty( $cB['sub_heading'] ) ){
            $return['content_grid'] .= '<p class="anim__fade anim__fade-up">'.$cB['sub_heading'].'</p>';
        }

        // check for filtering
        if( !empty($cB['options']['enable_filter']) ){
            $return['content_grid'] .= '<div class="filters">';
            ob_start();
            include('parts/filters.client_category.php');
            $return['content_grid'] .= ob_get_clean().'</div>';
        }
         
        // we are going to loop. check the options
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
}

unset($bgColor, $hasBg, $lightText);

?>