<?php
	/*
	Plugin Name: Digital Presence - Google Analytics
	Plugin URI: http://digitalpresence.dk/wp-plugin
	Description: Google Analytics plugin
	Version: 0.1
	Author: Jakob Kragelund
	Author URI: http://digitalpresence.dk
	License: GPL2
	*/
	
	function add_dashboard_widget() {
		wp_add_dashboard_widget(
			'dp_analytics',
			'Digital Presence - Google Analytics',
			'dashboard_widget_render'
		);
	}
	
	function load_dashboard_analytics_js() {
		wp_register_script('dp_analytics', plugins_url('js/dp-analytics.js', __FILE__));
		wp_enqueue_script('dp_analytics');
	}
	
	add_action('wp_dashboard_setup', 'add_dashboard_widget');
	add_action('admin_enqueue_scripts', 'load_dashboard_analytics_js');
	
	function dashboard_widget_render() {
		echo get_template_directory_uri();
	}
	
	
?>