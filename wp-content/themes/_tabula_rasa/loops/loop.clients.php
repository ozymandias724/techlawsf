<?php 
/**
 *  Loop: Clients Repeater
 *      
 *  Returns an unordered list of clients using the flexgrid
*/
    if( empty($fields['client_list']['client_list']) ){
        $fields = get_fields( get_the_ID() );
    }
    if( empty($fields['client_list']['client_list']) ){
        // something went wrong; theres no clients!
    } else {

        
        $cL = $fields['client_list']['client_list'];
        
        $guide['client_list'] = '
            <li class="ijs__clients-client anim__fade anim__fade-left">
                %s
                <div class="info">
                    %s
                    <div>
                        %s
                        %s
                    </div>
                </div>
                <div class="details">
                    %s
                </div>
            </li>
        ';

        
        $return['client_list'] = '
            <section class="site__block clients">
                <div class="container ' . $cL['width'] . '">
                '. (!empty($cL['heading']) ? '<h2 class="block-heading anim__fade anim__fade-up">' . $cL['heading'] . '</h2>' : '') . '
                '. (!empty($cL['sub_heading']) ? '<p class="block-subheading anim__fade anim__fade-up">' . $cL['sub_heading'] . '</p>' : '') . '
                <div class=""><ul>
        ';
        
        foreach( $cL['clients'] as $i => $client ){

            

            $return['client_list'] .= sprintf(
                $guide['client_list']
                ,( !empty($client['category']) ? '<span class="category">'.$client['category'].'</span>' : '' )
                ,( !empty($client['image']) ? '<div class="bgimg"><div class="bgimg-img" style="background-image: url('.$client['image']['url'].')"></div></div>' : '' )
                ,( !empty($client['name']) ? '<p class="name">'.$client['name'].'</p>' : '' )
                ,( !empty($client['funding']) ? '<p class="funding">'.$client['funding'].'</p>' : '' )
                ,( !empty($client['details']) ? '<p>'.trim($client['details']).'</p>' : '' )
            );
            
            if( ($i + 1) % 3 == 0 ){
                $return['client_list'] .= '<hr />';
            }
        }
        $return['client_list'] .= '</ul></div></div></section>';
    
    
    
        echo $return['client_list'];
    }
?>