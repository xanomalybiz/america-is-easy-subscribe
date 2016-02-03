<?php
/**
* Plugin Name: America Is Easy Suscribe Widget 
* Description: A Form to suscribe to the America is Easy Newsletter
* Version: 10.0
* Author: Xanomaly
**/

//Exit if accessed Directly
if(!defined('ABSPATH'))
{
	exit;	
}

//load scripts
require_once(plugin_dir_path(__FILE__) . '/includes/america-is-easy-suscribe-scripts.php');
//load class
require_once(plugin_dir_path(__FILE__) . '/includes/america-is-easy-suscribe-class.php');

//Register Widget
function register_aes()
{
	register_widget('America_Is_Easy_Suscribe_Widget');	
}

add_action('widgets_init', 'register_aes');