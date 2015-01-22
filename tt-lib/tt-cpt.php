<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
Requirements: php5.5.*
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////// 2020 CPT's

add_action( 'init', 'tt_cpt' );

function tt_cpt() {
    
    $cpt_singlular_name = 'Project';
    $cpt_plural_name = 'Projects';
    
    
	$labels = array(
		'name'               => _x( $cpt_plural_name, 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( $cpt_singlular_name, 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( $cpt_plural_name, 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( $cpt_singlular_name, 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', $cpt_singlular_name, 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New '.$cpt_singlular_nameBook, 'your-plugin-textdomain' ),
		'new_item'           => __( 'New '.$cpt_singlular_name, 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit '.$cpt_singlular_name, 'your-plugin-textdomain' ),
		'view_item'          => __( 'View '.$cpt_singlular_name, 'your-plugin-textdomain' ),
		'all_items'          => __( 'All '.$cpt_plural_name, 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search '.$cpt_plural_name, 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent '.$cpt_plural_name.':', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No '.$cpt_plural_name.' found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No '.$cpt_plural_name.' found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
	);

	register_post_type( 'project', $args );
}
    
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////// Roles

//////////////////////////////////////////////////////////////////////////////////////////////////////////////// Client role

function tt_role_client () {
    
    $capabilities = array(
        'manage_options' => true,
        
    );

add_role( 'tt_client', 'Client', $capabilities );
    
}
//add_action( 'init', 'tt_role_client', 0 ); // not working ??
tt_role_client (); 

////////////////////////////////////////////////////////

































    