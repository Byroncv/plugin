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
		 * add_action(string $tag, collable $function_to_add)
		 *
		 * Hooks a function on to a specific action.
		 */

		add_action('admin_menu', array($this, 'register_menu'));
		/**
		 * register admin_menu
		 */

		add_action('admin_enqueue_scripts', array($this, 'scripts'));
		/**
		 * register style, script
		 */
		add_action('admin_post_create_full_calendar', array($this, 'create'));

		add_action('admin_post_update_full_calendar', array($this, 'update'));

		add_action('admin_post_delete_full_calendar', array($this, 'delete'));


		add_shortcode('full_calendar', array($this, 'code'));
		/**
		 * add_shortcode(string $tag, callable $function);
		 */

	}

	public function register_menu()
	{
		add_menu_page(
			'Full_Calendar',
			'Full_Calendar',
			0,
			'Full_Calendar_Overview',
			array($this, 'view'),
			'dashicons-editor-ul'
		);
		/**
		 * add menu
		 * 
		 * add_menu_page(
		 * 		string $page_title,
		 * 		string $menu_title,
		 * 		string $capability,
		 * 		string $menu_slug,
		 * 		callable $function,
		 * 		string $icon_url
		 * 		int $position
		 * );
		 */
	}

	public function scripts()
	{
		wp_register_script( 'js','/wp-content/plugins/calendario/fullcalendar/main.js' );

        wp_enqueue_style( 'full-css', '/wp-content/plugins/calendario/fullcalendar/main.css' );
       
        
	}



public function create()
	{
		global $wpdb;
		/**
		 * global $wpdb;
		 * I will use wordpress database
		 */

		$wpdb->query($wpdb->prepare(
			"INSERT INTO wp_full_calenadar (title) VALUES (%s)",
			$_POST['title']
		));

		wp_redirect(wp_get_referer());
		/**
		 * redirect to the previous page
		 */
	}

	public function update()
	{
		global $wpdb;

		$wpdb->query($wpdb->prepare(
			"UPDATE wp_full_calenadar SET title = %s WHERE id = %s",
			$_POST['title'], $_POST['id']
		));

		wp_redirect(wp_get_referer());
	}

	public function delete()
	{
		global $wpdb;

		$wpdb->query($wpdb->prepare(
			"DELETE FROM wp_full_calenadar WHERE id = %s",
			$_GET['id']
		));

		wp_redirect(wp_get_referer());
	}

	public function view()
	{
		global $wpdb;

		$calendars = $wpdb->get_results("SELECT * FROM wp_full_calenadar");

		include 'view.php';
	}

	public function code()
	{
		global $wpdb;

		$calendars = $wpdb->get_results("SELECT * FROM wp_full_calenadar");
		
		include 'code.php';
	}
}

$fullCalendar = new Full_calendar();