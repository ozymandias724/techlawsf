<?php 
/**
 * HERO
*/

    $fields = get_fields(get_the_ID());

    // if on a post
    if( is_singular( ['practice_areas'] ) ){
        

        // open hero section
        $return['hero'] = '<section class="hero" style="background-image: url('.$fields['image']['url']. ')"><div class="container normal">';
        
         $guide['hero'] = '
            %s
            %s
        ';        
        $return['hero'] .= sprintf(
            $guide['hero']
            ,( !empty($post->post_title) ? '<h2>'.$post->post_title.'</h2>' : '' )
            ,( !empty($fields['excerpt']) ? '<p>'.$fields['excerpt'].'</p>' : '' )
        );
        
    }
    // else, presumably, on a page
    else if( !empty( $fields['hero']['use_hero'] ) ){
        // open hero section
        $return['hero'] = '<section class="hero" style="background-image: url('.$fields['hero']['image']['url']. ')"><div class="container normal">';
    
        $guide['hero'] = '
            %s
            %s
        ';        
        $return['hero'] .= sprintf(
            $guide['hero']
            ,( !empty($fields['hero']['heading']) ? '<h2>'.$fields['hero']['heading'].'</h2>' : '' )
            ,( !empty($fields['hero']['sub_heading']) ? '<p>'.$fields['hero']['sub_heading'].'</p>' : '' )
        );
    }

    // close hero section
    $return['hero'] .= '</div></section>';
    
    // write hero section
    echo $return['hero'];

 ?>