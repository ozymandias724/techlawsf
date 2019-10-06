<?php
/**
*   Card Block
* 
*   1 or 2 column split vertically or horizonatally
*
*/

 wp_enqueue_style('cardblock', get_template_directory_uri().'/blocks/card_block/card_block.css', 'main');

// return string
$return['card_block'] = '';
// return string
$return['card'] = '';

// open section and container
$return['card_block'] .= '
    <section class="site__block block__card">
        <div class="container ' . $cB['width'] . '">
';
// open card <ul>
$return['card'] .= '<div class="flexgrid cols-'. count($cB['columns']) .'"><ul>';

// loop thru each column
foreach ($cB['columns'] as $i => $column) {
    
    // open this column as a <li>
    $return['card'] .= '<li class="anim__fade anim__fade-up">';

    // within this column, loop thru each row
    foreach ($column as $rows) {

        // within this row, loop thru the flexible content layouts
        foreach($rows as $row){

            // include content blocks...
            $cB = $row;
            
            ob_start();
            $path = get_template_directory() . '/blocks/'.$cB['acf_fc_layout'].'/'.''.$cB['acf_fc_layout'].'.php';
            // include the block
            if( file_exists($path) ){
                include($path);
            }
            
            $return['card'] .= ob_get_clean();
        }
    }
    // close row container
    $return['card'] .= '</li>';
}
// close column container
$return['card'] .= '</ul></div>';

// write card into section
$return['card_block'] .= $return['card'];

// close and echo the section
echo $return['card_block'] . '</div></section>';

?>