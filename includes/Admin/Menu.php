<?php 

namespace Parbona\Admin;

class Menu {
	function __construct() {
		add_action( 'admin_menu', [ $this, 'add_menu' ] );
	}

	public function add_menu() {
		add_menu_page( __( 'Parbona', 'parbona' ), __( 'Parbona', 'parbona' ), 'manage_options', 'parbona', [ $this, 'parbona_pages' ], 'dashicons-database', 17 );
	}

	public function parbona_pages() {
		echo 'Welcome to here';
	}
}