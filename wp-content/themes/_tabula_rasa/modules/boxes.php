<?php 
    // check if the flexible content field has rows of data
    if( have_rows('boxes') ):
       
        // loop through the rows of data
        while ( have_rows('boxes') ) : the_row();

            $fctype = get_row_layout();
        
            $content_box = '<section class="fclayout fclayout__'.$fctype.'">';

            // box
            if( get_row_layout() == 'box' ):        
                $format_box = '
                    <h2>%s</h2>
                ';
                $content_box .= sprintf(
                    $format_box
                    ,get_sub_field('text')
                );
            endif;

            // img grid
            if( get_row_layout() == 'image_grid' ):        
                
                $format_img = '
                    <li><div class="bgimg"><div class="bgimg-img" style="background-image: url(%s)"></div></div></li>
                ';

                
                $format_imggrid = '
                    <h2>%s</h2>
                    %s
                    <ul class="tr__image_grid_images">
                        %s
                    </ul>
                ';

                $content_box .= '<div class="tr__image_grid">';

                foreach( get_sub_field('clients') as $client ){
                    $content_imgs .= sprintf(
                        $format_img
                        ,$client['image']['url']
                    );
                }
                $content_box .= sprintf(
                    $format_imggrid
                    ,get_sub_field('heading')
                    ,get_sub_field('excerpt')
                    ,$content_imgs
                );
            endif;

            // client list
            if (get_row_layout() == 'client_list') :
            
                $format_client_list = '
                    <li>
                        Client Name: %s
                    </li>
                    <li>
                        Company Name: %s
                    </li>
                ';
                
                $content_box .= '<h2>'.get_sub_field('heading').'</h2>'.get_sub_field('excerpt').'<ul class="clients">';
                foreach (get_sub_field('clients') as $client) {
                    $content_box .= sprintf(
                        $format_client_list
                        ,$client['client_name']
                        ,$client['company_name']
                    );
                    
                }
                $content_box .= '</ul>';
                
            endif;
            $content_box .= '</section>';
            echo $content_box;

        endwhile;

    else :
        // no layouts found
    endif;  

?>