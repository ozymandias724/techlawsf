<?php 
/**
 *   Block
 * 
 *   Content Grid 
 */
if( !empty($cB) && $cB['acf_fc_layout'] == 'content_grid_block' ){

	$return['content_grid'] = '';
    $guide['content_grid'] = '';

	// verify there are records in the relationship field
	if( !empty($cB['content']) ){

        // open up a section,
        // open up container inside section
        $return['content_grid'] .= '<section class="site__block block__content_grid"><div class="container '.$cB['options']['width'].'">';

        // check for the heading,
        if( !empty( $cB['heading'] ) ){
            $return['content_grid'] .= '<h2 class="">'.$cB['heading'].'</h2>';
        }
        
        // check for the sub heading
        if( !empty( $cB['sub_heading'] ) ){
            $return['content_grid'] .= '<div class="">'.$cB['sub_heading'].'</div>';
        }
         
        // we are going to loop. check the options
        $return['content_grid'] .= '<div class="flexgrid cols-'.$cB['options']['column_count'].'"><ul class="'.$cB['content'][0]->post_type.' '.$cB['options']['alignment'].'">';

        // loop thru the post results (items are post objects)
        foreach ($cB['content'] as $i => $post) {

            
            // $return['content_grid'] .= '<li class="grid_item">';
            
            // check which post type this item is
            switch ($post->post_type) {
                // case '__EXAMPLE__':
                // ob_start();
                // include('parts/__EXAMPLE__.php');
                // $return['content_grid'] .= ob_get_clean();
                // break;
                case 'team_members':
                    $return['content_grid'] .= '<li class="grid_item anim__fade anim__fade-up">';
                    ob_start();
                    include('parts/grid.team_member.php');
                    $return['content_grid'] .= ob_get_clean();
                    $return['content_grid'] .= '</li>';
                    break;
                    case 'practice_areas':
                    $return['content_grid'] .= '<li class="grid_item">';
                    ob_start();
                    include('parts/grid.practice_area.php');
                    $return['content_grid'] .= ob_get_clean();
                    $return['content_grid'] .= '</li>';
                    break;
                    default:
                    $return['content_grid'] .= '<li class="grid_item"><h2>'.$post->post_title.'</h2></li>';
                    break;
                }
                
            // $return['content_grid'] .= '</li>';
        
        }

        $return['content_grid'] .= '</ul>';

        // check for the view all button
        if( !empty( $cB['button'] ) ){
            $return['content_grid'] .= '<a class="site__button" href="'.$cB['button']['url'].'">'.$cB['button']['title'].'</a>';
        }
        
        // close the content grid 
        $return['content_grid'] .= '</div></div></section>';

        echo $return['content_grid'];
	}
}

?>