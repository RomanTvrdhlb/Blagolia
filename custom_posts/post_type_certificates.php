<?php 
function certificates() {
	$labels = array(
		'name'               => 'Certificates',
		'singular_name'      => 'Certificate',
		'menu_name'          => 'Certificates',
		'name_admin_bar'     => 'Certificate',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Certificate',
		'new_item'           => 'New Certificate',
		'edit_item'          => 'Edit Certificate',
		'view_item'          => 'View Certificate',
		'all_items'          => 'All Certificates',
		'search_items'       => 'Search Certificates',
		'not_found'          => 'No certificates found.',
		'not_found_in_trash' => 'No certificates found in Trash.'
	);

	$args = array(
		'labels'              => $labels, // Теперь переменная определена заранее
		'supports'           => ['title', 'thumbnail', 'excerpt'],
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-list-view', // Или другая иконка
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type('certificates', $args);
}
add_action('init', 'certificates', 6);
