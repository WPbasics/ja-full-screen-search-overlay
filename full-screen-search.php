<?php
/**
* Plugin Name: Full Screen Search
* Plugin URI: https//www.wpbeginner.com/
* Version: 1.0.1
* Author: WPBeginner
* Author URI: https//www.wpbeginner.com/
* Description: Displays a full screen search box when interacting with a WordPress Search Field or Widget
*/

/**
 * Main plugin class.
 *
 * @since 1.0.0
 *
 * @package Full_Screen_Search
 */
class Full_Screen_Search {

	/**
	* Stores information about the Plugin
	*
	* @since 1.0.0
	*/
	public $plugin = '';

	/**
	* Constructor
	*
	* Adds necessary action and filter hooks for the plugin
	*
	* @since 1.0.0
	*/
	function __construct() {

		// Setup Plugin Details
        $this->plugin = new stdClass;
        $this->plugin->name         = 'full-screen-search';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->url          = plugin_dir_url( __FILE__ );

        // Add actions if we're not in the WordPress Administration to load CSS, JS and the Full Screen Search HTML
        if ( ! is_admin() ) {
        	add_action( 'wp_head', array( $this, 'enqueue_css_js' ) );
        	add_action( 'wp_footer', array( $this, 'output_full_screen_search' ) );
        }

	}

	/**
	* Loads the CSS and JS used for this plugin
	*
	* @since 1.0.0
	*/
	function enqueue_css_js() {

		// Load CSS
		wp_enqueue_style( $this->plugin->name, $this->plugin->url . 'assets/css/full-screen-search.css', array(), false );

		// Require WordPress' jQuery
		wp_enqueue_script( 'jquery' );

		// Load Javascript
		wp_enqueue_script( $this->plugin->name, $this->plugin->url . 'assets/js/full-screen-search.js', array( 'jquery' ), '1.0.0', true );
    
	}

	/**
	* Outputs the HTML markup for our Full Screen Search
	* CSS hides this by default, and Javascript displays it when the user
	* interacts with any WordPress search field
	*
	* @since 1.0.0
	*/
	function output_full_screen_search() {

		?>
        <div id="fullscreensearch">
            <div class="closesearch"><a href="#searchclose">X</a></div>
            <form role="search" method="get" action="<?php echo home_url( '/' ); ?>" id="full-screen-search-form">
                <input type="text"  placeholder="Search WP basics..." name="s" class="s search-input"
                       autocomplete="off">
                <input type="submit" class="searchsubmit search-submit" value="Search">
            </form>
        </div>
		<?php

	}

}

$full_screen_search = new Full_Screen_Search;