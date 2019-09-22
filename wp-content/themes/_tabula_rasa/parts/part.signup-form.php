<?php 
/**
 * Signup Form Partial
 * 
 * Used as the last section on most pages
 */


    $return = [ 'signup' => '' ];   
    $guide = [ 'signup' => '' ];   



    $guide['signup'] = '
        <section class="prefooter">
            <div class="container narrow">
                <h4>Get in touch</h4>
                <div>
                    %s
                </div>
            </div>
        </section>
    ';

    $return['signup'] .= sprintf(
        $guide['signup']
        ,do_shortcode('[wpforms id="606" title="false" description="false"]')
    );
    
 
 
    echo $return['signup'];
 ?>