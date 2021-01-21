<?php 
/**
 * Plugin Name: parbona product api
 * Description: Get all product from your shop.
 * Plugin URI: http://parbona.net
 * Author: Al-Amin Sarker
 * Author URI: http://parbona.net
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: parbona
 */

/*
    Copyright (C) 2021  Al-Amin Sarker<hello@parbona.net>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software.
*/
if( ! defined( 'ABSPATH' ) ) exit;

final class Parbona {
		
    public $version = '1.0';

	private function __construct() {
		
		require_once __DIR__ . '/vendor/autoload.php';

        $this->define_constants();

        $this->instance();
	}

	public static function init() {
        
        static $instance = false;

        if ( ! $instance ) {
            $instance = new Parbona();
        }

        return $instance;
    }

    public function instance() {
		new Parbona\Admin\Menu();
		new Parbona\REST\Parbona_Product_Api();
    }

	public function define_constants() {
        define( 'PARBONA_PLUGIN_VERSION', $this->version );
        define( 'PARBONA_FILE', __FILE__ );
        define( 'PARBONA_DIR', dirname( PARBONA_FILE ) );
        define( 'PARBONA_INC', PARBONA_DIR . '/includes' );
        define( 'PARBONA_ADMIN_DIR', PARBONA_INC . '/Admin' );
        define( 'PARBONA_PLUGIN_ASSEST', plugins_url( 'assets', PARBONA_FILE ) );
    }
}

function parbona() {
    Parbona::init();
}

parbona();