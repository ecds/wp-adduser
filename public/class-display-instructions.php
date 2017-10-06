<?php

/**
 * Retrieves information from the database.
 *
 * @package Add_User_Instructions
 */

/**
 * Retrieves information from the database.
 *
 * This requires the information being retrieved from the database should be
 * specified by an incoming key. If no key is specified or a value is not found
 * then an empty string will be returned.
 *
 * @package Add_User_Instructions
 */

class Display_Instructions {

    /**
    * A reference to the class for retrieving our option values.
    *
    * @access private
    * @var    Deserializer
    */
    private $deserializer;

    /**
    * Initializes the class by setting a reference to the incoming deserializer.
    *
    * @param Deserializer $deserializer Retrieves a value from the database.
    */
    public function __construct( $deserializer ) {
        $this->deserializer = $deserializer;
    }

    /**
    * Initializes the hook responsible for prepending the content with the
    * option created on the options page.
    */
    public function init() {
        // if ($type == 'add-new-user') {
            $dataToBePassed = array(
                'internal' => $this->deserializer->get_value( 'ecds-add-internal-user-instructions' ),
                'internalHeader' => $this->deserializer->get_value( 'ecds-add-internal-user-instructions-header' ),
                'externalHeader' => $this->deserializer->get_value( 'ecds-add-external-user-instructions-header' ),
                'external' => $this->deserializer->get_value( 'ecds-add-external-user-instructions' )
            );
            wp_enqueue_script( 'my_js_library', plugin_dir_url(__FILE__) . 'scripts/instructions.js' );
            wp_localize_script( 'my_js_library', 'php_vars', $dataToBePassed );
        // }
    }
}
