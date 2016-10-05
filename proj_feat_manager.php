<?php
/**
* Plugin Name: Projects & Features Manager
* Description: Project & Feature post types. Client, agency, studio, director, editor, year, and length taxonomies.
* Version: 0.1
* Author: Preston Edmands
* License: GPL2
*/

/*  Copyright 2016  Preston Edmands  (email : pedmands@gmail.com)

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
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'			  => array('clients', 'agencies', 'year','director','editor')
    );
	register_post_type('projects', $args );

    $labels = array(
        'name'               => 'Features',
        'singular_name'      => 'Feature',
        'menu_name'          => 'Features',
        'name_admin_bar'     => 'Feature',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Feature',
        'new_item'           => 'New Feature',
        'edit_item'          => 'Edit Feature',
        'view_item'          => 'View Feature',
        'all_items'          => 'All Features',
        'search_items'       => 'Search Features',
        'parent_item_colon'  => 'Parent Features:',
        'not_found'          => 'No Features found.',
        'not_found_in_trash' => 'No Features found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-video-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'features' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'              => array('year','length','director','editor','studios')
    );
    register_post_type('features', $args );
}

add_action( 'init', 'custom_posttypes' );


function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is wr
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

	// Client
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

	// Agency
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

// Year
    $labels = array(
        'name'              => 'Year',
        'singular_name'     => 'Year',
        'search_items'      => 'Search Years',
        'all_items'         => 'All Years',
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => 'Edit Year',
        'update_item'       => 'Update Year',
        'add_new_item'      => 'Add New Year',
        'new_item_name'     => 'New Year',
        'menu_name'         => 'Year',
    );

    $args = array(
         'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => false,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'           => array( 'slug' => 'year' ),
    );
    
    register_taxonomy('year', array('projects', 'features'), $args);

    // Length
    $labels = array(
        'name'              => 'Length',
        'singular_name'     => 'Length',
        'search_items'      => 'Search Lengths',
        'all_items'         => 'All Lengths',
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => 'Edit Length',
        'update_item'       => 'Update Length',
        'add_new_item'      => 'Add New Length',
        'new_item_name'     => 'New Length',
        'menu_name'         => 'Length',
    );

    $args = array(
         'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => false,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'           => array( 'slug' => 'length' ),
    );
    
    register_taxonomy('length', array('features'), $args);

    // Director
    $labels = array(
        'name'              => 'Director',
        'singular_name'     => 'Director',
        'search_items'      => 'Search Directors',
        'all_items'         => 'All Directors',
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => 'Edit Director',
        'update_item'       => 'Update Director',
        'add_new_item'      => 'Add New Director',
        'new_item_name'     => 'New Director',
        'menu_name'         => 'Directors',
    );

    $args = array(
         'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => false,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'           => array( 'slug' => 'director' ),
    );
    
    register_taxonomy('director', array('projects', 'features'), $args);

    // Editor
    $labels = array(
        'name'              => 'Editor',
        'singular_name'     => 'Editor',
        'search_items'      => 'Search Editors',
        'all_items'         => 'All Editors',
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => 'Edit Editor',
        'update_item'       => 'Update Editor',
        'add_new_item'      => 'Add New Editor',
        'new_item_name'     => 'New Editor',
        'menu_name'         => 'Editors',
    );

    $args = array(
         'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => false,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'           => array( 'slug' => 'editor' ),
    );
    
    register_taxonomy('editor', array('projects', 'features'), $args);

    // Studio
    $labels = array(
        'name'              => 'Studio',
        'singular_name'     => 'Studio',
        'search_items'      => 'Search Studios',
        'all_items'         => 'All Studios',
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => 'Edit Studio',
        'update_item'       => 'Update Studio',
        'add_new_item'      => 'Add New Studio',
        'new_item_name'     => 'New Studio',
        'menu_name'         => 'Studios',
    );

    $args = array(
         'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => false,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'           => array( 'slug' => 'studios' ),
    );
    
    register_taxonomy('studios', array('features'), $args);
}

add_action('init', 'custom_taxonomies');
