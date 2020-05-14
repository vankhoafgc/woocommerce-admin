<?php
/**
 * Rule processor that fails.
 *
 * @package WooCommerce Admin/Classes;
 */

namespace Automattic\WooCommerce\Admin\RemoteInboxNotifications;

defined( 'ABSPATH' ) || exit;

/**
 * Rule processor that fails.
 */
class FailRuleProcessor {
	/**
	 * Fails the rule.
	 *
	 * @param object $rule The specific rule being processed by this rule processor.
	 * @param object $data Persistent data.
	 *
	 * @return bool Always false.
	 */
	public function process( $rule, $data ) {
		return false;
	}
}
