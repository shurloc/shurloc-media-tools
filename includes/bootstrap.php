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
		__DIR__
	);

	$autoloader->register();
}

add_action(
	'plugins_loaded',
	__NAMESPACE__ . '\\shurloc_media_tools_bootstrap',
	20
);
