<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');	// call in WP core

$pageQuery = explode("/",$_SERVER['REQUEST_URI']);

$person = $pageQuery[2];

$args = array(
    'post_type' => $pageQuery['1']
    ,'name' => $pageQuery['2']
    ,'posts_per_page' => 1
);
$posts = get_posts($args);

$rec = $posts[0];
$fields = get_fields($rec->ID);


$return['bio'] = '';
$guide['bio'] = '
    <h2>%s</h2>
    <div>
        %s
    </div>
';

$return['bio'] .= sprintf(
    $guide['bio']
    ,$rec->post_title
    ,$fields['bio']
);


?>
<div class="popup popup-bio">
    
    <div class="container">
    <?php echo $return['bio']; ?>
    </div>
    
</div>