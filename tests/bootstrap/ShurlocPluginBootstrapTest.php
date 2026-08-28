<?php
/**
 * Tests for plugin bootstrap.
 *
 * @package ShurlocMediaTools
 */

declare( strict_types=1 );

namespace Shurloc\MediaTools;

use PHPUnit\Framework\TestCase;

/**
 * Tests plugin initialization.
 *
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
final class ShurlocPluginBootstrapTest extends TestCase {

	/**
	 * Prepare each test.
	 *
	 * @return void
	 */
	protected function setUp(): void {

		parent::setUp();

		$GLOBALS['shurloc_test_actions']         = array();
		$GLOBALS['shurloc_test_action_metadata'] = array();
		$GLOBALS['shurloc_test_filters']         = array();
		$GLOBALS['shurloc_test_filter_metadata'] = array();
		$GLOBALS['shurloc_test_styles']          = array();
	}

	/**
	 * Bootstrap function should exist.
	 *
	 * @return void
	 */
	public function test_bootstrap_function_exists(): void {

		$this->load_plugin();

		self::assertTrue(
			function_exists(
				__NAMESPACE__ .
					'\\shurloc_media_tools_bootstrap'
			)
		);
	}

	/**
	 * Bootstrap should initialize the autoloader.
	 *
	 * @return void
	 */
	public function test_bootstrap_registers_autoloader(): void {

		$this->load_plugin();

		shurloc_media_tools_bootstrap();

		self::assertTrue(
			class_exists(
				Shurloc_Autoloader::class
			)
		);
	}

	/**
	 * Bootstrap should initialize the Media SEO service.
	 *
	 * @return void
	 */
	public function test_bootstrap_loads_media_seo_service(): void {

		$this->load_plugin();

		shurloc_media_tools_bootstrap();

		self::assertTrue(
			class_exists(
				Shurloc_Media_SEO_Service::class
			)
		);
	}

	/**
	 * Bootstrap should initialize the Media Library SEO controller.
	 *
	 * @return void
	 */
	public function test_bootstrap_loads_media_library_seo_controller(): void {

		$this->load_plugin();

		shurloc_media_tools_bootstrap();

		self::assertTrue(
			class_exists(
				Shurloc_Media_Library_SEO_Controller::class
			)
		);
	}

	/**
	 * Bootstrap should register Media Library SEO hooks.
	 *
	 * @return void
	 */
	public function test_bootstrap_registers_media_library_seo_hooks(): void {

		$this->load_plugin();

		shurloc_media_tools_bootstrap();

		self::assertArrayHasKey(
			'manage_upload_columns',
			$GLOBALS['shurloc_test_filters']
		);

		self::assertArrayHasKey(
			'manage_upload_sortable_columns',
			$GLOBALS['shurloc_test_filters']
		);

		self::assertArrayHasKey(
			'manage_media_custom_column',
			$GLOBALS['shurloc_test_actions']
		);

		self::assertArrayHasKey(
			'pre_get_posts',
			$GLOBALS['shurloc_test_actions']
		);

		self::assertArrayHasKey(
			'restrict_manage_posts',
			$GLOBALS['shurloc_test_actions']
		);

		self::assertArrayHasKey(
			'admin_enqueue_scripts',
			$GLOBALS['shurloc_test_actions']
		);
	}

	/**
	 * Load the plugin file.
	 *
	 * @return void
	 */
	private function load_plugin(): void {

		require_once dirname( __DIR__, 2 ) .
			'/shurloc-media-tools.php';
	}
}
