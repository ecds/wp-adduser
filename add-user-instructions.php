<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also defines a function that starts the plugin.
 *
 * @link              https://github.com/ecds/wp-adduser-instructions
 * @since             1.0.0
 * @package           Add_User_Instructions
 *
 * @wordpress-plugin
 * Plugin Name:       Add User Instructions
 * Plugin URI:        https://github.com/ecds/wp-adduser-instructions
 * Description:       Add custom instructions to add user screen.
 * Version:           1.0.0
 * Author:            ECDS Dev Team
 * Author URI:        http://digitalscholarship.emory.edu/
 * License:           Apache-2.0
 * License URI:       https://github.com/ecds/wp-adduser-instructions/blob/master/LICENSE
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
     die;
}

// Include the shared dependency.
include_once( plugin_dir_path( __FILE__ ) . 'shared/class-deserializer.php' );
include_once( plugin_dir_path( __FILE__ ) . 'public/class-display-instructions.php' );

// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
    include_once $file;
}


add_action( 'plugins_loaded', 'add_user_instructions_menu' );
add_action( 'load-user-new.php', 'display_add_user_instructions' );
add_action( 'admin_action_createuser', 'prevent_creation_of_emory_account' );

/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function add_user_instructions_menu() {
    $serializer = new Serializer();
    $serializer->init();

    $deserializer = new Deserializer();

    $plugin = new Submenu( new Submenu_Page( $deserializer ) );
    $plugin->init();
}

function display_add_user_instructions() {
    $deserializer = new Deserializer();

    // Setup the public facing functionality.
    $public = new Display_Instructions( $deserializer );
    $public->init();
}

function prevent_creation_of_emory_account() {
    $deserializer = new Deserializer();
    if (strpos(wp_unslash( $_REQUEST['email'] ), 'emory.edu')) {
        wp_die(
            $deserializer->get_value( 'ecds-add-internal-user-instructions' ),
            400
        );
    }
}
