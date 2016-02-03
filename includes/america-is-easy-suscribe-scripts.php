<?php
	function aes_add_scripts()
	{
		wp_enqueue_style('aes-main-style', plugins_url().   '/america-is-easy-suscribe/css/style.css');	
		wp_enqueue_script('aes-main-script', plugins_url(). '/america-is-easy-suscribe/js/main.js', array('jquery'));	
		
	}
	
add_action('wp_enqueue_scripts', 'aes_add_scripts');
?>