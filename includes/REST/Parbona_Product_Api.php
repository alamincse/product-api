<?php 

namespace Parbona\REST;

use WP_REST_Controller;

class Parbona_Product_Api extends WP_REST_Controller {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'load_js' ] );
		add_action( 'rest_api_init', [ $this, 'register_route' ] );
	}

	public function load_js() {
		wp_enqueue_script( 'my-script', PARBONA_PLUGIN_ASSEST . '/js/parbona-main.js', array( 'jquery' ), NULL, false );

    	wp_localize_script( 'my-script', 'parbonaVar', [
	        'root'  => esc_url_raw( rest_url() ),
	        'nonce' => wp_create_nonce( 'wp_rest' ),
	    ] );
	}

	public function register_route() {
		register_rest_route( 'parbona/v1', 'demo-api', [
	      	'methods'  => \WP_REST_Server::READABLE, // same as wp_remote_get() / GET method
	      	'callback' => [ $this, 'rest_callback' ],
	      	'permission_callback' => [ $this, 'check_permission' ]
    	] );
	}

	public function rest_callback() {
		$args = [ 
		    'post_type' => 'product', 
		    'post_status' => 'publish', 
		    'nopaging' => true,
		];

		$query = new \WP_Query( $args );
		$data = $query->get_posts();

	    $response = new \WP_REST_Response( $data, 200 );
	    $response->set_headers( [ 'Cache-Control' => 'must-revalidate, no-cache, no-store, private' ] );

	    return $response;
	}

	public function check_permission() {
		return is_user_logged_in();
	}
}