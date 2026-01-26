<?php
/**
 * Share Analytics Upsell Page
 *
 * Displays a blurred preview of the Share Analytics feature
 * to promote the Pro version.
 *
 * @package suspended_Social_Icons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WPZOOM_Share_Analytics_Upsell
 */
class WPZOOM_Share_Analytics_Upsell {

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
		add_action( 'admin_menu', array( $this, 'add_menu_item' ), 25 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_head', array( $this, 'admin_menu_badge_css' ) );
	}

	/**
	 * Add menu item
	 */
	public function add_menu_item() {
		add_submenu_page(
			'edit.php?post_type=wpzoom-shortcode',
			__( 'Analytics', 'social-icons-widget-by-wpzoom' ),
			__( 'Analytics', 'social-icons-widget-by-wpzoom' ) . ' <span class="wpzoom-pro-badge">Pro</span>',
			'manage_options',
			'wpzoom-share-analytics',
			array( $this, 'render_page' )
		);
	}

	/**
	 * Output inline CSS for Pro badge in admin menu
	 */
	public function admin_menu_badge_css() {
		?>
		<style>
			#adminmenu .wpzoom-pro-badge {
				background: #2271b1;
				color: #fff;
				font-size: 9px;
				padding: 2px 5px;
				border-radius: 3px;
				margin-left: 5px;
				text-transform: uppercase;
				font-weight: 600;
				vertical-align: middle;
			}
		</style>
		<?php
	}

	/**
	 * Enqueue styles
	 *
	 * @param string $hook Current admin page.
	 */
	public function enqueue_styles( $hook ) {
		if ( 'wpzoom-shortcode_page_wpzoom-share-analytics' !== $hook ) {
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
	 * Render the upsell page
	 */
	public function render_page() {
		$upgrade_url = 'https://www.wpzoom.com/plugins/social-widget/?utm_source=wpadmin&utm_medium=plugin&utm_campaign=social-icons-free&utm_content=analytics-page';
		?>
		<div class="wrap wpzoom-analytics-upsell-wrap">
			<h1><?php esc_html_e( 'Share Analytics', 'social-icons-widget-by-wpzoom' ); ?> <span class="wpzoom-pro-badge"><?php esc_html_e( 'Pro', 'social-icons-widget-by-wpzoom' ); ?></span></h1>
			<p class="wpzoom-analytics-description"><?php esc_html_e( 'Track how visitors share your content across social platforms.', 'social-icons-widget-by-wpzoom' ); ?></p>

			<div class="wpzoom-analytics-preview-container">
				<!-- Blurred Preview -->
				<div class="wpzoom-analytics-preview-blurred">
					<!-- Stats Cards Row -->
					<div class="wpzoom-stats-cards">
						<div class="wpzoom-stat-card">
							<span class="wpzoom-stat-icon dashicons dashicons-share"></span>
							<div class="wpzoom-stat-content">
								<span class="wpzoom-stat-number">1,247</span>
								<span class="wpzoom-stat-label"><?php esc_html_e( 'Total Shares', 'social-icons-widget-by-wpzoom' ); ?></span>
							</div>
						</div>
						<div class="wpzoom-stat-card">
							<span class="wpzoom-stat-icon dashicons dashicons-heart"></span>
							<div class="wpzoom-stat-content">
								<span class="wpzoom-stat-number">892</span>
								<span class="wpzoom-stat-label"><?php esc_html_e( 'Total Likes', 'social-icons-widget-by-wpzoom' ); ?></span>
							</div>
						</div>
						<div class="wpzoom-stat-card">
							<span class="wpzoom-stat-icon dashicons dashicons-chart-bar"></span>
							<div class="wpzoom-stat-content">
								<span class="wpzoom-stat-number">+23%</span>
								<span class="wpzoom-stat-label"><?php esc_html_e( 'This Week', 'social-icons-widget-by-wpzoom' ); ?></span>
							</div>
						</div>
					</div>

					<!-- Chart Placeholder -->
					<div class="wpzoom-chart-placeholder">
						<div class="wpzoom-chart-title"><?php esc_html_e( 'Shares Over Time', 'social-icons-widget-by-wpzoom' ); ?></div>
						<div class="wpzoom-chart-bars">
							<div class="wpzoom-chart-bar" style="height: 40%;"></div>
							<div class="wpzoom-chart-bar" style="height: 65%;"></div>
							<div class="wpzoom-chart-bar" style="height: 45%;"></div>
							<div class="wpzoom-chart-bar" style="height: 80%;"></div>
							<div class="wpzoom-chart-bar" style="height: 55%;"></div>
							<div class="wpzoom-chart-bar" style="height: 90%;"></div>
							<div class="wpzoom-chart-bar" style="height: 70%;"></div>
						</div>
						<div class="wpzoom-chart-labels">
							<span>Mon</span>
							<span>Tue</span>
							<span>Wed</span>
							<span>Thu</span>
							<span>Fri</span>
							<span>Sat</span>
							<span>Sun</span>
						</div>
					</div>

					<!-- Platform Breakdown -->
					<div class="wpzoom-platform-breakdown">
						<div class="wpzoom-platform-title"><?php esc_html_e( 'Shares by Platform', 'social-icons-widget-by-wpzoom' ); ?></div>
						<div class="wpzoom-platform-list">
							<div class="wpzoom-platform-item">
								<span class="wpzoom-platform-name">Facebook</span>
								<div class="wpzoom-platform-bar-wrapper">
									<div class="wpzoom-platform-bar" style="width: 75%; background: #0866FF;"></div>
								</div>
								<span class="wpzoom-platform-count">423</span>
							</div>
							<div class="wpzoom-platform-item">
								<span class="wpzoom-platform-name">X (Twitter)</span>
								<div class="wpzoom-platform-bar-wrapper">
									<div class="wpzoom-platform-bar" style="width: 55%; background: #000;"></div>
								</div>
								<span class="wpzoom-platform-count">312</span>
							</div>
							<div class="wpzoom-platform-item">
								<span class="wpzoom-platform-name">LinkedIn</span>
								<div class="wpzoom-platform-bar-wrapper">
									<div class="wpzoom-platform-bar" style="width: 40%; background: #0966c2;"></div>
								</div>
								<span class="wpzoom-platform-count">228</span>
							</div>
							<div class="wpzoom-platform-item">
								<span class="wpzoom-platform-name">WhatsApp</span>
								<div class="wpzoom-platform-bar-wrapper">
									<div class="wpzoom-platform-bar" style="width: 30%; background: #25D366;"></div>
								</div>
								<span class="wpzoom-platform-count">167</span>
							</div>
							<div class="wpzoom-platform-item">
								<span class="wpzoom-platform-name">Email</span>
								<div class="wpzoom-platform-bar-wrapper">
									<div class="wpzoom-platform-bar" style="width: 20%; background: #333;"></div>
								</div>
								<span class="wpzoom-platform-count">117</span>
							</div>
						</div>
					</div>

					<!-- Top Shared Posts -->
					<div class="wpzoom-top-posts">
						<div class="wpzoom-top-posts-title"><?php esc_html_e( 'Top Shared Posts', 'social-icons-widget-by-wpzoom' ); ?></div>
						<table class="wpzoom-top-posts-table">
							<thead>
								<tr>
									<th><?php esc_html_e( 'Post Title', 'social-icons-widget-by-wpzoom' ); ?></th>
									<th><?php esc_html_e( 'Shares', 'social-icons-widget-by-wpzoom' ); ?></th>
									<th><?php esc_html_e( 'Likes', 'social-icons-widget-by-wpzoom' ); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>10 Tips for Better Productivity</td>
									<td>245</td>
									<td>189</td>
								</tr>
								<tr>
									<td>How to Start a Successful Blog</td>
									<td>198</td>
									<td>156</td>
								</tr>
								<tr>
									<td>The Ultimate Guide to SEO</td>
									<td>167</td>
									<td>134</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Upgrade Overlay -->
				<div class="wpzoom-pro-overlay">
					<div class="wpzoom-pro-overlay-content">
						<span class="wpzoom-pro-badge-large"><?php esc_html_e( 'Pro Feature', 'social-icons-widget-by-wpzoom' ); ?></span>
						<h2><?php esc_html_e( 'Unlock Share Analytics', 'social-icons-widget-by-wpzoom' ); ?></h2>
						<p><?php esc_html_e( 'Track your social sharing performance with detailed analytics. See which posts are shared the most, which platforms drive the most engagement, and how your content performs over time.', 'social-icons-widget-by-wpzoom' ); ?></p>
						<ul class="wpzoom-pro-features-list">
							<li><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Track shares across all platforms', 'social-icons-widget-by-wpzoom' ); ?></li>
							<li><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Like button with engagement tracking', 'social-icons-widget-by-wpzoom' ); ?></li>
							<li><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Share counts from external sources', 'social-icons-widget-by-wpzoom' ); ?></li>
							<li><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'AI share buttons (ChatGPT, Claude, Perplexity)', 'social-icons-widget-by-wpzoom' ); ?></li>
							<li><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Dashboard widget with quick stats', 'social-icons-widget-by-wpzoom' ); ?></li>
							<li><span class="dashicons dashicons-yes"></span> <?php esc_html_e( 'Custom SVG icon uploads', 'social-icons-widget-by-wpzoom' ); ?></li>
						</ul>
						<a href="<?php echo esc_url( $upgrade_url ); ?>" class="button button-primary button-hero" target="_blank">
							<?php esc_html_e( 'Upgrade to Pro', 'social-icons-widget-by-wpzoom' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

// Initialize the class.
WPZOOM_Share_Analytics_Upsell::get_instance();
