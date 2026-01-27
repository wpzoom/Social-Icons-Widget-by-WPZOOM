<?php
/**
 * Sharing Buttons Admin Notice
 *
 * Displays a dismissible notice on the dashboard promoting the sharing buttons feature.
 *
 * @package WPZOOM_Social_Icons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WPZOOM_Sharing_Buttons_Notice
 */
class WPZOOM_Sharing_Buttons_Notice {

	/**
	 * The single class instance.
	 *
	 * @var $instance
	 */
	private static $instance = null;

	/**
	 * Notice dismiss key
	 *
	 * @var string
	 */
	private $dismiss_key = 'wpzoom_sharing_buttons_notice_dismissed';

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
		add_action( 'admin_notices', array( $this, 'display_notice' ) );
		add_action( 'wp_ajax_wpzoom_dismiss_sharing_notice', array( $this, 'dismiss_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Check if notice should be displayed
	 *
	 * @return bool
	 */
	private function should_display_notice() {
		// Only show to admins.
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		// Check if dismissed.
		if ( get_user_meta( get_current_user_id(), $this->dismiss_key, true ) ) {
			return false;
		}

		// Only show on dashboard or plugin pages.
		$screen = get_current_screen();
		if ( ! $screen ) {
			return false;
		}

		$allowed_screens = array(
			'dashboard',
			'plugins',
			'edit-wpzoom-shortcode',
		);

		if ( ! in_array( $screen->id, $allowed_screens, true ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Get the sharing config edit URL
	 *
	 * @return string|false
	 */
	private function get_sharing_config_url() {
		$posts = get_posts(
			array(
				'post_type'      => 'wpzoom-sharing',
				'posts_per_page' => 1,
				'post_status'    => 'publish',
			)
		);

		if ( ! empty( $posts ) ) {
			return admin_url( 'post.php?post=' . $posts[0]->ID . '&action=edit' );
		}

		return false;
	}

	/**
	 * Display the admin notice
	 */
	public function display_notice() {
		if ( ! $this->should_display_notice() ) {
			return;
		}

		$configure_url = $this->get_sharing_config_url();

		// If no config exists yet, don't show the notice.
		if ( ! $configure_url ) {
			return;
		}

		$nonce = wp_create_nonce( 'wpzoom_dismiss_sharing_notice' );
		?>
		<div class="notice notice-info is-dismissible wpzoom-sharing-notice" data-nonce="<?php echo esc_attr( $nonce ); ?>">
			<div class="wpzoom-sharing-notice-content">
				<div class="wpzoom-sharing-notice-icon">
					<svg width="40" height="40" viewBox="0 0 24 24" fill="#3496ff">
						<path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92-1.31-2.92-2.92-2.92z"/>
					</svg>
				</div>
				<div class="wpzoom-sharing-notice-text">
					<h3><?php esc_html_e( 'Add Social Sharing Buttons to Your Posts', 'social-icons-widget-by-wpzoom' ); ?></h3>
					<p><?php esc_html_e( 'Let your visitors share your content on social media! Enable sharing buttons that appear automatically on all your posts and pages.', 'social-icons-widget-by-wpzoom' ); ?></p>
					<p class="wpzoom-sharing-notice-pro-hint">
						<?php
						printf(
							/* translators: %s: upgrade link */
							esc_html__( 'Want more? %s adds AI Share Buttons, Like Button, Share Counts & Analytics.', 'social-icons-widget-by-wpzoom' ),
							'<a href="https://www.wpzoom.com/plugins/social-widget/?utm_source=wpadmin&utm_medium=plugin&utm_campaign=social-icons-free&utm_content=sharing-notice" target="_blank"><strong>' . esc_html__( 'PRO', 'social-icons-widget-by-wpzoom' ) . '</strong></a>'
						);
						?>
					</p>
					<div class="wpzoom-sharing-notice-actions">
						<a href="<?php echo esc_url( $configure_url ); ?>" class="button wpzoom-sharing-btn-primary">
							<?php esc_html_e( 'Configure Sharing Buttons', 'social-icons-widget-by-wpzoom' ); ?>
						</a>
						<a href="https://www.wpzoom.com/plugins/social-widget/?utm_source=wpadmin&utm_medium=plugin&utm_campaign=social-icons-free&utm_content=sharing-notice-btn" class="button wpzoom-sharing-btn-upgrade" target="_blank">
							<span class="dashicons dashicons-star-filled" style="font-size: 16px; line-height: 28px; width: 16px; height: 16px; margin-right: 3px;"></span>
							<?php esc_html_e( 'Upgrade to Pro', 'social-icons-widget-by-wpzoom' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Enqueue scripts and styles for the notice
	 *
	 * @param string $hook Current admin page.
	 */
	public function enqueue_scripts( $hook ) {
		if ( ! $this->should_display_notice() ) {
			return;
		}

		wp_add_inline_style( 'common', '
			.wpzoom-sharing-notice {
				padding: 0 !important;
				border-left-color: #3496ff !important;
			}
			.wpzoom-sharing-notice-content {
				display: flex;
				align-items: center;
				padding: 15px 30px 15px 12px;
				gap: 15px;
			}
			.wpzoom-sharing-notice-icon {
				flex-shrink: 0;
			}
			.wpzoom-sharing-notice-text {
				flex: 1;
			}
			.wpzoom-sharing-notice-text h3 {
				margin: 0 0 5px 0;
				font-size: 14px;
			}
			.wpzoom-sharing-notice-text p {
				margin: 0;
				color: #50575e;
			}
			.wpzoom-sharing-notice-pro-hint {
				margin-top: 6px !important;
				font-size: 12px;
				color: #888 !important;
			}
			.wpzoom-sharing-notice-pro-hint a {
				color: #3496ff;
				text-decoration: none;
			}
			.wpzoom-sharing-notice-actions {
				display: flex;
				gap: 8px;
				margin-top: 10px;
			}
			.wpzoom-sharing-btn-primary.button {
				background: #1a1a1a !important;
				color: #fff !important;
				border-color: #1a1a1a !important;
				border-radius: 4px;
			}
			.wpzoom-sharing-btn-primary.button:hover {
				background: #3496ff !important;
				border-color: #3496ff !important;
			}
			.wpzoom-sharing-btn-upgrade.button {
				border-color: #1a1a1a !important;
				color: #1a1a1a !important;
				border-radius: 4px;
			}
			.wpzoom-sharing-btn-upgrade.button:hover {
				background: #3496ff !important;
				border-color: #3496ff !important;
				color: #fff !important;
			}
			@media (max-width: 782px) {
				.wpzoom-sharing-notice-content {
					flex-wrap: wrap;
				}
				.wpzoom-sharing-notice-actions {
					width: 100%;
					margin-top: 10px;
				}
			}
		' );

		wp_add_inline_script( 'common', '
			jQuery(document).ready(function($) {
				$(".wpzoom-sharing-notice").on("click", ".notice-dismiss", function() {
					var $notice = $(this).closest(".wpzoom-sharing-notice");
					$.post(ajaxurl, {
						action: "wpzoom_dismiss_sharing_notice",
						nonce: $notice.data("nonce")
					});
				});
			});
		' );
	}

	/**
	 * AJAX handler to dismiss notice
	 */
	public function dismiss_notice() {
		check_ajax_referer( 'wpzoom_dismiss_sharing_notice', 'nonce' );
		update_user_meta( get_current_user_id(), $this->dismiss_key, true );
		wp_die();
	}
}

// Initialize the class.
WPZOOM_Sharing_Buttons_Notice::get_instance();
