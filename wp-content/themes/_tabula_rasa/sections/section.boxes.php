<?php 


    // check if the flexible content field has rows of data
    if( have_rows('boxes') ):

        $format_box = '
            <section class="%s">
                <h2>%s</h2>
            </section>
        ';
        $format_img = '
            <div class="clients-client" style="background-image: url(%s)"></div>
        ';
        $format_imggrid = '
            <section class="%s">
                <h2>%s</h2>
                <div class="clients">
                    %s
                </div>
            </section>
        ';
        // loop through the rows of data
        while ( have_rows('boxes') ) : the_row();
            if( get_row_layout() == 'box' ):        
                $fctype = 'fc_box';
                $content_box = sprintf(
                    $format_box
                    ,$fctype
                    ,get_sub_field('text')
                );
                echo $content_box;
            endif;
            if( get_row_layout() == 'image_grid' ):        
                $fctype = 'image_grid';

                foreach( get_sub_field('clients') as $client ){
                    $content_imgs .= sprintf(
                        $format_img
                        ,$client['image']['url']
                    );
                }

                $content_box = sprintf(
                    $format_imggrid
                    ,$fctype
                    ,get_sub_field('heading')
                    ,$content_imgs
                );

                
                
                echo $content_box;
            endif;

        endwhile;

    else :
        // no layouts found
    endif;  

?>