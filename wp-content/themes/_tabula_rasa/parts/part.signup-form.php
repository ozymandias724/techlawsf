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
                <h2 class="anim__fade anim__fade-up">Get in touch</h2>
                <div class="anim__fade anim__fade-up">
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