<?php

/*
 * GDPR Compliance
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('SCP_Privacy')) :

    /**
     * SCP_Privacy class
     */
    class SCP_Privacy {

        /**
         * SCP_Privacy constructor.
         */
        public function __construct() {
            $this->init_hooks();
        }

        /**
         * Register Smart Content Protector
         */
        public function init_hooks() {
            // This hook registers Smart Content Protector privacy content
            add_action('admin_init', array(__CLASS__, 'register_privacy_content'), 20);
        }

        /**
         * Register Smart Content Protector Privacy Content
         */
        public static function register_privacy_content() {
            if (!function_exists('wp_add_privacy_policy_content')) {
                return;
            }

            $content = self::get_privacy_message();
            if ($content) {
                wp_add_privacy_policy_content('Smart Content Protector', $content);
            }
        }

        /**
         * Prepare Privacy Content
         */
        public static function get_privacy_message() {
            $content = '<p>This includes the basics of what personal data your store may be collecting, '
                    . 'storing and sharing. Depending on what settings are enabled and which additional plugins are used, '
                    . 'the specific information shared by your store will vary</p>'
                    . '<h2>WHAT THE PLUGIN DOES</h2>'
                    . '<p>You can restrict your users from performing the following actions on your site</p>'
                    . '<ul><li>- Copy Content</li>'
                    . '<li>- View Source Code</li>'
                    . '<li>- Save Images</li>'
                    . '<li>- etc</li></ul>'
                    . '<h2>WHAT WE COLLECT AND STORE</h2>'
                    . '<h3>IP ADDRESS</h3>'
                    . '<p>We record the IP Address of the users who tried to perform the following actions</p>'
                    . '<ul><li>- Copy Content</li>'
                    . '<li>- View Source Code</li>'
                    . '<li>- Save Images</li>'
                    . '<li>- etc</li></ul>';
            
            return $content;
        }

    }

    new SCP_Privacy();

endif;
