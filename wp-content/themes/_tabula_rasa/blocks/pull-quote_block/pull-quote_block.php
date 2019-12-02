<?php 
/**
*  Heading Content Block
* 
* 
*/
    // wp_enqueue_style('pull-quote_block', get_template_directory_uri().'/blocks/pull-quote_block/pull-quote_block.css', 'main');
    
    
    $return['pull-quote_block'] = '<blockquote>'.$cB['pull-quote_block']['text'].'</blockquote>';
    
   

    // echo return string
    echo $return['pull-quote_block'];
 ?>