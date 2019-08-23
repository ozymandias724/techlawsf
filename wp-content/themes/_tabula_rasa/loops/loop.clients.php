<?php 
/**
 *  Loop: Clients Repeater
 *      
 *  Returns an unordered list of clients using the flexgrid
*/
    if( empty($fields['clients']) ){
        $fields = get_fields( get_the_ID() );
    }
    if( empty($fields['clients']) ){
        // something went wrong; theres no clients!
    } else {

        
        $guide['clients'] = '
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

        
        $return['clients'] = '
            <section class="clients">
                <div class="container normal">
                    <div class="flexgrid cols-2"><ul>
        ';
        
        foreach( $fields['clients'] as $client ){
            $return['clients'] .= sprintf(
                $guide['clients']
                ,( !empty($client['image']) ? '<div class="bgimg"><div class="bgimg-img" style="background-image: url('.$client['image']['url'].')"></div></div>' : '' )
                ,( !empty($client['name']) ? '<h4>'.$client['name'].'</h4>' : '' )
                ,( !empty($client['funding']) ? '<h5>'.$client['funding'].'</h5>' : '' )
                ,( !empty($client['details']) ? '<div>'.$client['details'].'</div>' : '' )
            );
        }
        $return['clients'] .= '</ul></div></div></section>';
    
    
    
        echo $return['clients'];
    }
?>