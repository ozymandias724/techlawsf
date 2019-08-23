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
            <li class="client js__clients-client">
                <div>
                    %s
                    <div>
                        %s
                        %s
                    </div>
                </div>
                %s
            </li>
        ';

        
        $return['client_list'] = '
            <section class="site__block clients">
                <div class="container ' . $cL['width'] . '">
                '. (!empty($cL['heading']) ? '<h2 class="block-heading">' . $cL['heading'] . '</h2>' : '') . '
                '. (!empty($cL['sub_heading']) ? '<p class="block-subheading">' . $cL['sub_heading'] . '</p>' : '') . '
                <div class="flexgrid cols-2"><ul>
        ';
        
        foreach( $cL['clients'] as $client ){
            $return['client_list'] .= sprintf(
                $guide['client_list']
                ,( !empty($client['image']) ? '<div class="bgimg"><div class="bgimg-img" style="background-image: url('.$client['image']['url'].')"></div></div>' : '' )
                ,( !empty($client['name']) ? '<h4>'.$client['name'].'</h4>' : '' )
                ,( !empty($client['funding']) ? '<h5>'.$client['funding'].'</h5>' : '' )
                ,( !empty($client['details']) ? '<div>'.$client['details'].'</div>' : '' )
            );
        }
        $return['client_list'] .= '</ul></div></div></section>';
    
    
    
        echo $return['client_list'];
    }
?>