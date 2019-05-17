<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class DIY_Project_Directory {
	
	public function __construct() {
		$this->init();
	}

	private function init(){
		add_action('init', array($this, 'codex_init' ));
		add_action('init', array($this, 'create_taxonomies'));
	}

	/**
	 * Register a custom post type
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */

	public function codex_init() {
		$labels = array(
			'name'               => _x( 'DIY Projects', 'post type general name', 'dei' ),
			'singular_name'      => _x( 'DIY Project', 'post type singular name', 'dei' ),
			'menu_name'          => _x( 'DIY Projects', 'admin menu', 'dei' ),
			'name_admin_bar'     => _x( 'DIY Project', 'add new on admin bar', 'dei' ),
			'add_new'            => _x( 'Add New', 'DIY Project', 'dei' ),
			'add_new_item'       => __( 'Add New DIY Project', 'dei' ),
			'new_item'           => __( 'New DIY Project', 'dei' ),
			'edit_item'          => __( 'Edit DIY Project', 'dei' ),
			'view_item'          => __( 'View DIY Project', 'dei' ),
			'all_items'          => __( 'All DIY Project', 'dei' ),
			'search_items'       => __( 'Search DIY Projects', 'dei' ),
			'parent_item_colon'  => __( 'Parent DIY Project:', 'dei' ),
			'not_found'          => __( 'No DIY Project found.', 'dei' ),
			'not_found_in_trash' => __( 'No DIY Projects found in Trash.', 'dei' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => false,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'diy-project-directory' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 12,
			'menu_icon'			 => 'dashicons-admin-tools',
			'show_in_rest'       => true,
			'rest_base'          => 'diy-project-directory-api',
			'supports'           => array( 'title', 'thumbnail','page-attributes', 'editor', 'custom-fields' )
		);

		register_post_type( 'diy-project', $args );
	}

	/**
	 * Register a taxonomy
	 *
	 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	public function create_taxonomies() {
		$labels = array(
			'name'              => _x( 'DIY Project Category', 'taxonomy general name' ),
			'singular_name'     => _x( 'DIY Project Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search DIY Project Categories' ),
			'all_items'         => __( 'All DIY Project Categories' ),
			'parent_item'       => __( 'Parent DIY Project Category' ),
			'parent_item_colon' => __( 'Parent DIY Project Category:' ),
			'edit_item'         => __( 'Edit DIY Project Category' ),
			'update_item'       => __( 'Update DIY Project Category' ),
			'add_new_item'      => __( 'Add New DIY Project Category' ),
			'new_item_name'     => __( 'New DIY Project Category Name' ),
			'menu_name'         => __( 'DIY Project Categories' ),
		);

		$args = array(
			'hierarchical'      => true,
			'sort'				=> true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'diy-project-categories' ),
			'show_in_rest'       => true,
		  	'rest_base'          => 'diy-project-category',
		  	'rest_controller_class' => 'WP_REST_Terms_Controller',
		);

		register_taxonomy( 'diy-project-category', array( 'diy-project' ), $args );
	}

}

$dei_project_directory =new DIY_Project_Directory();

