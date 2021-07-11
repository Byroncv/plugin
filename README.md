# plugin
codigo de full calendar
this plugin requires a custom post type to work
<!-- register_post_type('agendar', 
		array(
			//Visibilidad en la plataforma
			'public' => true,
			'supports' => array('title', 'editor', 'excerpt'),
			// si el contenido se despliega en una plantilla tipo archive
			'has_archive' => true,
			//Empleado reescritura para que WP atienda a la nueva palabra eventos y muestre la información, de todos los eventos
			'rewrite' => array('slug'=>'agendar'),
			'menu_icon' => 'dashicons-admin-multisite',
			//Activar el conjunto de etiquetas que se van a mostrar en la aplicación de WordPress
			'labels' => array(
				'name' => 'agendar',
				'add_new_item' =>'agregar nombre' ,
				'add_new' =>'Agregar Cita' ,
				'edit_item' => 'Editar nombre',
				'all_items' => 'Todas las citas'

				
			),

  		
	));

}
  //inicializar e registro 
add_action('init', 'agendar'); -->
