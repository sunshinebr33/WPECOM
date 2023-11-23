// Prevent direct call
if ( !defined( 'WPINC' ) ) die;

// Prevent redeclaring class
if ( class_exists( 'WP_ECOM' ) ) wp_die ( __( 'WP_ECOM class has been declared!', 'go_pricing_yet_textdomain' ) );	

// Include & init main class
include_once( plugin_dir_path( __FILE__ ) . 'includes/class_yet.php' );
add_action( 'go_pricing_init', 'go_pricing_yet_init' );
function go_pricing_yet_init() {
	WP_ECOM::instance( __FILE__ );
}

// Register activation / deactivation / uninstall hooks
register_activation_hook( __FILE__, array( 'WP_ECOM', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_ECOM', 'deactivate' ) );
register_uninstall_hook( __FILE__, array( 'WP_ECOM', 'uninstall' ) );

// Activation error admin notice
add_action( 'admin_notices', array( 'WP_ECOM', 'activate_error' ) );

?>
