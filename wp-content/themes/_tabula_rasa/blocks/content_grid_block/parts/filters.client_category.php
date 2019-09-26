<?php 
/**
 * These render the client categories
 */

    
    $return['filters'] = '';

    // 
    $allTerms = get_terms('client_category');
    // 
    foreach( $allTerms as $i => $term ){
        $return['filters'] .= '<a class="button js__clients-filter-item" href="#'.$term->slug.'" title="View only our '.$term->name.' clients">'.$term->name.'</a>';
    }
    
    // 
    echo $return['filters'];

 ?>