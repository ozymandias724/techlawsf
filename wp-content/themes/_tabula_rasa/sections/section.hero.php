<?php 
/**
 * Section Name: Hero Image
 */
    $is_homepage = ( get_page_template_slug($post_id) == 'templates/template.homepage.php' ) ? true : false;

    $hero_fields = get_fields($post_id);
    $hero_image = ( !empty($hero_fields['image']) ) ? '<div style="background-image:url('.$hero_fields['image']['url'].')" class="hero-image"></div>': '';
    $hero_title = ( !empty($hero_fields['title']) ) ? '<h1>'.$hero_fields['title'].'</h1>': '';
    $hero_tagline = ( !empty($hero_fields['tagline']) ) ? '<h3>'.$hero_fields['tagline'].'</h3>': '';

    $format_hero = '<section class="hero %s">%s<div>%s%s</div></section>';

    $content_hero = sprintf(
        $format_hero
        ,( !$is_homepage ) ? 'banner' : ''
        ,$hero_image
        ,$hero_title
        ,$hero_tagline
    );  
    echo $content_hero;
?>