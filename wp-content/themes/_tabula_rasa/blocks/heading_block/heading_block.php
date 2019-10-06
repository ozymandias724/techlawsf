<?php 
/**
*  Heading Content Block
* 
* 
*/
    wp_enqueue_style('headingblock', get_template_directory_uri().'/blocks/heading_block/heading_block.css', 'main');
    $return['heading_block'] = '';
    
    // guide string for the section
    $guide['heading_block'] = '
        <section class="site__block block__heading">
            <div class="container '.$cB['width'].'" style="text-align: '.$cB['alignment'].'">
                %s
                %s
            </div>
        </section>
    ';
    // return string for the section
    $return['heading_block'] .= sprintf(
        $guide['heading_block']
        ,'<'.$cB['level'].' class="anim__fade anim__fade-up">'.$cB['heading'] . '</'.$cB['level'].'>' // heading content w/ level and alignment
        ,'<p class="anim__fade anim__fade-up">'.$cB['sub_heading'].'</p>'
    );

    // echo return string
    echo $return['heading_block'];
 ?>