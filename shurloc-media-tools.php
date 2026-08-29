<?php
/**
 * Plugin Name:       Shur-loc Media Tools
 * Plugin URI:        https://github.com/shurloc/shurloc-media-tools
 * Description:       Media tools for the Shur-loc website.
 * Version:           0.1.2
 * Requires at least: 7.0
 * Requires PHP:      8.4
 * Requires Plugins:  shurloc-tools
 * Author:            Shur-loc
 * Author URI:        https://shurloc.com/
 * Text Domain:       shurloc-media-tools
 *
 * @package ShurlocMediaTools
 */

namespace Shurloc\MediaTools;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/includes/constants.php';
require_once __DIR__ . '/includes/bootstrap.php';
