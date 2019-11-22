<?php 
/**
 * 
 */

   wp_enqueue_style('slick', get_template_directory_uri().'/blocks/__lib/slick/slick.css', 'main');
   wp_enqueue_style('slick-theme', get_template_directory_uri().'/blocks/__lib/slick/slick-theme.css', 'main');
   wp_enqueue_script( 'slick', get_template_directory_uri().'/blocks/__lib/slick/slick.min.js', 'main', '1.8.1', true);
 
   $cB = $fields['client_spotlight'];



   // 
   // 
   // build the featured client card

   if( !empty($cB['featured_client']) ){
      
      $the_fields = get_fields($cB['featured_client']->ID);
   
      $return['client_list'] = '';
      $guide['client_list'] = '
         <li %s class=" anim__fade anim__fade-up featured_client">
            %s
            <div class="info">
                  <div>
                     %s
                     %s
                  </div>
                  %s
            </div>    
            %s
         </li>
      ';
   
      $terms = get_the_terms( $cB['featured_client'], 'client_category' );
   
      $return['client_list'] .= sprintf(
         $guide['client_list']
         ,( !empty($terms) ? 'data-term="'.$terms[0]->slug.'"' : '' )
         ,( !empty($terms) ? '<p class="category"><span>'.$terms[0]->name.'</span></p>' : '' )
         ,( !empty($cB['featured_client']->post_title) ? '<p class="name">'.$cB['featured_client']->post_title.'</p>' : '' )
         ,( !empty($the_fields['funding']) ? '<p class="funding">'.$the_fields['funding'].'</p>' : '' )
         ,( !empty($the_fields['image']) ? '<div class="bgimage"><div class="bgimage-img" style="background-image: url('.$the_fields['image']['url'].')"></div></div>' : '' )
         ,( !empty($the_fields['details']) ? '<div class="details">'.trim($the_fields['details']).'</div>' : '' )
      );
   }


   
   // 
   // 
   // 
   // build the clients banner

   $return['clients_banner'] = '';
   if( !empty($cB['featured_banner']) ){
      $guide['clients_banner'] = '<li><img src="%s" alt=""></li>';
      // clean this up
      $args = array(
         'post_type' => 'clients'
         ,'posts_per_page' => -1
      );
      $clients = get_posts( $args );
      // 
      foreach( $clients as $i => $rec ){
   
         $clientFields = get_fields($rec);

         if( !empty($clientFields['image']['url']) ){
            $return['clients_banner'] .= sprintf(
               $guide['clients_banner']
               ,$clientFields['image']['url']
            );
         }
         
      }

   }



   // 
   // 
   // 
   // 
   // 
   
   $return['client_spotlight'] = '';

    // guide string for the section
    $guide['client_spotlight'] = '
      <section class="site__block client_spotlight">
         <div class="container '.$cB['width'].'">
            <div class="flexgrid cols-2">
               <ul>
                  <li>
                     %s
                     %s
                     %s
                  </li>
                  %s
               </ul>
            </div>
            <div class="client_spotlight-banner anim__fade anim__fade-up">
               <ul>
                  %s
               </ul>
            </div>
         </div>
      </section>
    ';
    // return string for the section
    $return['client_spotlight'] .= sprintf(
        $guide['client_spotlight']
        ,'<h2 class="anim__fade anim__fade-up">'.$cB['heading'].'</h2>'
        ,'<p class="anim__fade anim__fade-up">'.$cB['sub_heading'].'</p>'
        ,'<p><a class="button ghost anim__fade anim__fade-up" href="'.( !empty($cB['button']['url']) ? ''.$cB['button']['url'].'' : '' ).'" title="View">'.( !empty($cB['button']['text']) ? $cB['button']['text'] : $cB['button']['title'] ).'</a></p>'
        ,$return['client_list']
        ,$return['clients_banner']
    );
   

   echo $return['client_spotlight'];


   unset($return, $cB);
?>