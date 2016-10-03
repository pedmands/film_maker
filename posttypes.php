<?php
/**
* Plugin Name: Project Manager
* Description: A simple plugin to publish projects with the project name, client, agency, and role(s) performed.
* Version: 0.1
* Author: Preston Edmands
* License: GPL2
*/

/*  Copyright 2015  Preston Edmands  (email : pedmands@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function custom_posttypes() {
	$labels = array(
        'name'               => 'Projects',
        'singular_name'      => 'Project',
        'menu_name'          => 'Projects',
        'name_admin_bar'     => 'Project',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Project',
        'new_item'           => 'New Project',
        'edit_item'          => 'Edit Project',
        'view_item'          => 'View Project',
        'all_items'          => 'All Projects',
        'search_items'       => 'Search Projects',
        'parent_item_colon'  => 'Parent Projects:',
        'not_found'          => 'No Projects found.',
        'not_found_in_trash' => 'No Projects found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-format-video',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'work' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'			  => array('clients', 'agencies', 'roles')
    );
	register_post_type('Projects', $args );
}

add_action( 'init', 'custom_posttypes' );

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

// Custom Taxonomies

function custom_taxonomies() {

	// Language(s) Used
    $labels = array(
        'name'              => 'Client',
        'singular_name'     => 'Client',
        'search_items'      => 'Search Clients',
        'all_items'         => 'All Clients',
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => 'Edit Client',
        'update_item'       => 'Update Client',
        'add_new_item'      => 'Add New Client',
        'new_item_name'     => 'New Client',
        'menu_name'         => 'Clients',
    );

    $args = array(
         'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'           => array( 'slug' => 'clients' ),
    );
	
	register_taxonomy('clients', array('projects'), $args);

	// Software
	$labels = array(
        'name'                       => 'Agency',
        'singular_name'              => 'Agency',
        'search_items'               => 'Search Agencies',
        'popular_items'              => 'Popular Agencies',
        'all_items'                  => 'All Agencies',
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit Agency',
        'update_item'                => 'Update Agency',
        'add_new_item'               => 'Add New Agency',
        'new_item_name'              => 'New Agency Name',
        'separate_items_with_commas' => 'Separate Agencies with commas',
        'add_or_remove_items'        => 'Add or remove Agencies',
        'choose_from_most_used'      => 'Choose from the most used Agency',
        'not_found'                  => 'No Agency found.',
        'menu_name'                  => 'Agencies',
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'agencies' ),
    );
	register_taxonomy('agencies', array('projects'), $args);

	// Project Type
	$labels = array(
        'name'              => 'Role',
        'singular_name'     => 'Role',
        'search_items'      => 'Search Roles',
        'all_items'         => 'All Roles',
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => 'Edit Role',
        'update_item'       => 'Update Role',
        'add_new_item'      => 'Add New Role',
        'new_item_name'     => 'New Role',
        'menu_name'         => 'Roles',
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'roles' ),
    );
	register_taxonomy('roles', array('projects'), $args);

}

add_action('init', 'custom_taxonomies');
