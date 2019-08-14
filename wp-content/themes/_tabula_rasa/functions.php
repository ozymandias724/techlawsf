<?php 
require('classes/class.setup-theme.php');
require('classes/class.cpts.php');
require('includes/ext.acf.php');
require(get_template_directory() . '/classes/navwalker.php');



function do_custom_rewrite_rules(){
    add_rewrite_rule('^team_members/([^/]*)/bio/?', 'wp-content/themes/_tabula_rasa/parts/popup.bio.php?team_member=$1', 'top');
}

add_action('init', 'do_custom_rewrite_rules');

?>