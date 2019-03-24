<?php 
/**
 * Footer
 */

    

?>
<footer>
    <ul class="footergrid">
        <li>
            <ul>
                <li><h4>Tech Law SF Group INC.</h4></li>
                <li><h5>A california law corporation</h5></li>
                <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
            </ul>
        </li>
        <li>
            <ul>
                <li><h4>Contact Us</h4></li>
                <li><a href="tel:415-200-2977"><i class="fa fa-phone"></i><span>415-200-2977</span></a></li>
                <li><a href="mailto:accounts@techlawsf.com"><i class="fa fa-envelope"></i><span>accounts@techlawsf.com</span></a></li>
                <li><a href="javascript:;"><i class="fa fa-map"></i><span>2090 Broadway Street, Suite 604<br>San Francisco, California 94115</span></a></li>
            </ul>
        </li>
        <li>
            <ul>
                <li><h4>Practice Areas</h4></li>
                <li><a href="javascript:;">Featured Post 1</a></li>
                <li><a href="javascript:;">Featured Post 2</a></li>
                <li><a href="javascript:;">Featured Post 3</a></li>
            </ul>
        </li>
        <li>
            <ul>
                <li><h4>Legal</h></li>
                <li><a href="javascript:;">Attorney Advertising</a></li>
                <li><a href="javascript:;">Privacy Policy</a></li>
                <li><a href="javascript:;">Terms</a></li>
            </ul>
        </li>
    </ul>
    <!-- tiny bar at the bottom -->
    <div>
        <small>&copy; Copyright 2019, Tech Law SF Group Inc.</small>
    </div>


    <?php 
 
    if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
    ?> <script src="//localhost:35729/livereload.js"></script> <?php
    }
    wp_footer();
?>
</footer>
</body>
</html>