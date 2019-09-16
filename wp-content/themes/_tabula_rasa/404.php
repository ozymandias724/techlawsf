<?php 
/**
 * 
 */
    get_header();
?>
<main>
<section class="site__block" id="flexzach">
<div class="container normal">
<?php 

    $return['flexzach'] = '<ul class="flexbox-parent">';
    
    $guide['flexzach'] = '<li class="flexbox-child">%s</li>';
    
    // lets do 9 loops
    for ($i=0; $i < 9; $i++) { 
        
        $return['flexzach'] .= sprintf(
            $guide['flexzach']
            ,$i
        );
        
    }
    
    $return['flexzach'] .= '</ul>';

    echo $return['flexzach'];
 ?>
</div>
</section>
</main>
<?php 
    get_footer();
?>