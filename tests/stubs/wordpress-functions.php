<?php
/**
 * WordPress function test doubles.
 *
 * @package ShurlocMediaTools
 */

declare( strict_types=1 );

/**
 * Test post metadata.
 */
$GLOBALS['shurloc_test_post_meta'] = array();


if ( ! function_exists( 'get_post_meta' ) ) {

	/**
	 * Retrieve post metadata.
	 *
	 * @param int    $post_id Post ID.
	 * @param string $key     Meta key.
	 * @param bool   $single  Whether to return a single value.
	 * @return mixed
	 */
	function get_post_meta(
		int $post_id,
		string $key = '',
		bool $single = false
	) {

		$post_meta =
			$GLOBALS['shurloc_test_post_meta'][ $post_id ] ?? array();

		if ( '' === $key ) {
			return $post_meta;
		}

		if ( ! array_key_exists( $key, $post_meta ) ) {
			return $single
				? ''
				: array();
		}

		$value = $post_meta[ $key ];

		if ( $single ) {
			return $value;
		}

		return array( $value );
	}
}
