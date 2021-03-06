<?php 
/**
 * HERO
*/

    //
    $fields = get_fields(get_the_ID());

    // if this is a post handle the hero space
    if( is_singular( ['practice_areas'] ) ){

        // open hero section
        $return['hero'] = '<section class="hero hero__hasimage" style="background-image: url('.( !empty($fields['index_view']['image']['url']) ? $fields['index_view']['image']['url'] : '' ). ')"><div class="container wide">';
         $guide['hero'] = '
            %s
            %s
        ';        
        $return['hero'] .= sprintf(
            $guide['hero']
            ,( !empty($post->post_title) ? '<h1 class="anim__fade anim__fade-left">'.$post->post_title.'</h1>' : '' )
            ,( !empty($fields['excerpt']) ? '<div class="anim__fade anim__fade-left">'.$fields['excerpt'].'</div>' : '' )
        );

    }
    // else, presumably, on a page; use the hero field
    else if( !empty( $fields['hero']['use_hero'] ) ){
        // open hero section
        $return['hero'] = '';
    
        $guide['hero'] = '
            <section class="hero %s" style="%s%s"><div class="container wide %s">
                %s
                %s
        ';        
        $return['hero'] .= sprintf(
            $guide['hero']
            ,( !empty($fields['hero']['image']['url']) ? 'hero__hasimage' : '' )
            ,( !empty($fields['hero']['image']['url']) ? 'background-image: url('.$fields['hero']['image']['url'].');' : '' )
            ,( !empty($fields['hero']['fill']) ? 'background-color:'.$fields['hero']['fill'].';' : '' )
            ,( !empty($fields['hero']['text_color']) ? '' : 'hero__dark-text' )
            ,( !empty($fields['hero']['heading']) ? '<h1 class="anim__fade anim__fade-left">'.$fields['hero']['heading'].'</h1>' : '' )
            ,( !empty($fields['hero']['sub_heading']) ? '<div class="anim__fade anim__fade-right"><h4>'.$fields['hero']['sub_heading'].'</h4></div>' : '' )
        );
    }

    // close hero section
    $return['hero'] .= '</div></section>';
    
    // write hero section
    echo $return['hero'];

 ?>