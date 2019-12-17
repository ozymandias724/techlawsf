<?php 
/**
 * These render the client categories
 */

    
$return['filters'] = '';
$return['filters'] = '<a class="button ghost active js__clients-filter-item anim__fade anim__fade-left" data-term="all" href="javascript:void(0);" title="View all our clients">All</a>';

    // 
    $allTerms = get_terms('client_category');
    // 
    foreach( $allTerms as $i => $term ){
        $return['filters'] .= '<a class="button ghost js__clients-filter-item anim__fade anim__fade-left" href="#'.$term->slug.'" data-term="'.$term->slug.'"  title="View only our '.$term->name.' clients">'.$term->name.'</a>';
    }
    
    // 
    echo $return['filters'];

 ?>