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
    <section>
        <div class="bgimg"><div class="bgimg-img" style="background-image: url(%s)"></div></div>
        <div>
            <h2>%s</h2>
            <h4>%s</h4>
            %s
            %s
            %s    
        </div>
    </section>
    <div>
        %s
    </div>
';

$return['bio'] .= sprintf(
    $guide['bio']
    ,$fields['picture']['url']
    ,$rec->post_title
    ,$fields['position']
    ,( !empty( $fields['contact_info']['email'] ) ? '<p><a href="'.$fields['contact_info']['email'].'" title="Email '.$post->post_title.'">'. $fields['contact_info']['email'] . '</a></p>' : '' )
    ,( !empty( $fields['contact_info']['phone'] ) ? '<p><a href="'.$fields['contact_info']['phone']. '" title="Call ' . $post->post_title . '">'. $fields['contact_info']['phone'] . '</a></p>' : '' )
    ,get_iconlinks($fields['contact_info'])
    ,$fields['bio']
);


?>
<div class="popup popup-bio">
    
    <div class="container">
    <?php echo $return['bio']; ?>
    </div>
    
</div>