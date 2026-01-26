<?php
/**
 * Dashboard Widget Upsell
 *
 * Displays a teaser dashboard widget for Share Analytics
 * to promote the Pro version.
 *
 * @package WPZOOM_Social_Icons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WPZOOM_Dashboard_Widget_Upsell
 */
class WPZOOM_Dashboard_Widget_Upsell {

	/**
	 * The single class instance.
	 *
	 * @var $instance
	 */
	private static $instance = null;

	/**
	 * Main Instance
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widget' ) );
		add_action( 'wp_ajax_wpzoom_dismiss_stats_widget', array( $this, 'dismiss_widget' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Add dashboard widget
	 */
	public function add_dashboard_widget() {
		// Check if user dismissed the widget.
		if ( get_user_meta( get_current_user_id(), 'wpzoom_stats_widget_dismissed', true ) ) {
			return;
		}

		wp_add_dashboard_widget(
			'wpzoom_social_sharing_stats',
			__( 'Social Sharing Stats', 'social-icons-widget-by-wpzoom' ) . ' <span class="wpzoom-pro-badge">Pro</span>',
			array( $this, 'render_widget' )
		);
	}

	/**
	 * Enqueue styles on dashboard
	 *
	 * @param string $hook Current admin page.
	 */
	public function enqueue_styles( $hook ) {
		if ( 'index.php' !== $hook ) {
			return;
		}

		wp_enqueue_style(
			'wpzoom-admin-upsell',
			WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/admin-upsell.css',
			array(),
			WPZOOM_SOCIAL_ICONS_PLUGIN_VERSION
		);
	}

	/**
	 * Render the dashboard widget
	 */
	public function render_widget() {
		$upgrade_url = 'https://www.wpzoom.com/plugins/social-widget/?utm_source=wpadmin&utm_medium=plugin&utm_campaign=social-icons-free&utm_content=dashboard-widget';
		$nonce       = wp_create_nonce( 'wpzoom_dismiss_stats' );
		?>
		<div class="wpzoom-stats-widget">
			<button type="button" class="wpzoom-dismiss-widget" data-nonce="<?php echo esc_attr( $nonce ); ?>" title="<?php esc_attr_e( 'Dismiss', 'social-icons-widget-by-wpzoom' ); ?>">
				<span class="dashicons dashicons-no-alt"></span>
			</button>

			<div class="wpzoom-stats-widget-content">
				<div class="wpzoom-stats-row">
					<div class="wpzoom-stat-item">
						<span class="dashicons dashicons-share"></span>
						<div class="wpzoom-stat-info">
							<span class="wpzoom-stat-number">---</span>
							<span class="wpzoom-stat-label"><?php esc_html_e( 'Shares', 'social-icons-widget-by-wpzoom' ); ?></span>
						</div>
					</div>
					<div class="wpzoom-stat-item">
						<span class="dashicons dashicons-heart"></span>
						<div class="wpzoom-stat-info">
							<span class="wpzoom-stat-number">---</span>
							<span class="wpzoom-stat-label"><?php esc_html_e( 'Likes', 'social-icons-widget-by-wpzoom' ); ?></span>
						</div>
					</div>
				</div>

				<div class="wpzoom-widget-message">
					<p><?php esc_html_e( 'Track your social sharing performance with Pro', 'social-icons-widget-by-wpzoom' ); ?></p>
				</div>

				<div class="wpzoom-widget-features">
					<span><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Share Analytics', 'social-icons-widget-by-wpzoom' ); ?></span>
					<span><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Like Button', 'social-icons-widget-by-wpzoom' ); ?></span>
					<span><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'AI Buttons', 'social-icons-widget-by-wpzoom' ); ?></span>
				</div>

				<a href="<?php echo esc_url( $upgrade_url ); ?>" class="button button-primary" target="_blank">
					<?php esc_html_e( 'Learn More', 'social-icons-widget-by-wpzoom' ); ?>
				</a>
			</div>
		</div>

		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.wpzoom-dismiss-widget').on('click', function(e) {
				e.preventDefault();
				var $button = $(this);
				$.post(ajaxurl, {
					action: 'wpzoom_dismiss_stats_widget',
					nonce: $button.data('nonce')
				}, function() {
					$('#wpzoom_social_sharing_stats').fadeOut(300, function() {
						$(this).remove();
					});
				});
			});
		});
		</script>
		<?php
	}

	/**
	 * AJAX handler to dismiss widget
	 */
	public function dismiss_widget() {
		check_ajax_referer( 'wpzoom_dismiss_stats', 'nonce' );
		update_user_meta( get_current_user_id(), 'wpzoom_stats_widget_dismissed', true );
		wp_die();
	}
}

// Initialize the class.
WPZOOM_Dashboard_Widget_Upsell::get_instance();
