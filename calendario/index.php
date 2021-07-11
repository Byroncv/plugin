<?php

/**
 * Plugin Name: Full Calendar
 * Author: Byron
 * Version: 1.0.0
 */
class Full_Calendar
{
	public function __construct()
	{
		/**
		 * Hooks a function on to a specific action.
		 */

		add_action('admin_menu', array($this, 'register_menu'));
		/**
		 * register admin_menu
		 */

		add_action('admin_enqueue_scripts', array($this, 'scripts'));
		
		add_shortcode('full_calendar', array($this, 'code'));


	}

	public function register_menu()
	{
		add_menu_page(
			'Calendario',
			'Calendario',
			0,
			'Full_Calendar_Overview',
			array($this, 'view'),
			'dashicons-editor-ul'
		);
		
	}

	public function scripts()
	{
		 
		wp_enqueue_script( 'js','/wp-content/plugins/calendario/fullcalendar/main.js' );

		

		

        wp_enqueue_style( 'full-css', '/wp-content/plugins/calendario/fullcalendar/main.css' );
     
       
        
	}




	 
	public function view()
	{
		
		global $wpdb;

	
		$calendars = $wpdb->get_results( $wpdb->prepare( "SELECT post_content,post_date, post_title, post_status FROM $wpdb->posts WHERE post_type = 'agendar'"));
	
		

		include 'view.php';
	}
}

$fullCalendar = new Full_Calendar();