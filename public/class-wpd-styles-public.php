<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wpdispensary.com
 * @since      1.0.0
 *
 * @package    WPD_Styles
 * @subpackage WPD_Styles/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    WPD_Styles
 * @subpackage WPD_Styles/public
 * @author     WP Dispensary <deviodigital@gmail.com>
 */
class WPD_Styles_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name; 

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
        add_action( 'wp_footer', [ $this, 'append_popup_data' ] );
   
      
	}



    
  

    /*
        here add default popup data append in footer**
    */
    public function append_popup_data(){
        ?>
            <div id="wpd-quick-search-popup" class="white-popup-block mfp-hide"> 
                 <div id="close--popup-f"><img src="<?php echo get_site_url(); ?>/wp-content/plugins/wpd-styles/public/images/cancel.svg" /></div>
               
                <div class="wpd_data_insert_here">
                    
                </div>
          </div>
        <?php 
    }
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WPD_Styles_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WPD_Styles_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpd-styles-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WPD_Styles_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WPD_Styles_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	//	 https:

        wp_enqueue_script($this->plugin_name.'loading', '//cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js'); 
		wp_enqueue_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpd-styles-public.js', array( 'jquery' ), $this->version, false );
        wp_localize_script($this->plugin_name, 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php'),'SiteUrl'=> get_site_url()));         
        wp_enqueue_script($this->plugin_name); 
        
        /***********************************************
         * 
         * 
        ***********************************************/
	}

}
