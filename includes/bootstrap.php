<?php
/**
 * Plugin bootstrap.
 *
 * @package ShurlocMediaTools
 */

declare( strict_types=1 );

namespace Shurloc\MediaTools;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Bootstrap the plugin.
 */
function shurloc_media_tools_bootstrap(): void {
	/**
	 * Autoloader.
	 */

	require_once SHURLOC_MEDIA_TOOLS_PATH . 'includes/class-shurloc-autoloader.php';

	$autoloader = new Shurloc_Autoloader(
		base_directory: __DIR__,
	);

	$autoloader->register();

	/**
	 * Media Library SEO tools.
	 */

	$media_seo_service = new Shurloc_Media_SEO_Service();

	$media_library_seo_controller =
		new Shurloc_Media_Library_SEO_Controller(
			seo_service: $media_seo_service,
		);

	$media_library_seo_controller->register();
}

add_action(
	'plugins_loaded',
	__NAMESPACE__ . '\\shurloc_media_tools_bootstrap',
	20
);
