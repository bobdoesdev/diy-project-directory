<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class DEI_DIY_Archive {
	
	public function __construct() {
		$this->init();
	}

	private function init(){

			add_filter( 'archive_template', array($this, 'get_template' ) ) ;
		
		
		// add_filter( 'pre_get_posts', array( $this, 'search_filter' ) );
	}

	public function get_template(){
		if ( is_post_type_archive('diy-project') ) {
			require_once plugin_dir_path( __DIR__ ) . 'public/archive-diy-project.php';
		}
	}

	// public function search_filter($query){
	// 	if ( !is_admin() && $query->is_main_query() ) {
	// 		if ($query->is_search) {
	// 			$query->set('post_type', 'diy-project');
	// 		}
	// 	}
	// }

}

$dei_diy_archive =new DEI_DIY_Archive();




