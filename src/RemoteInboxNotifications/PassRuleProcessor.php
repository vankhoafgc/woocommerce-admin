<?php
/**
 * Rule processor that passes. This is required because an empty set of rules
 * (or predicate) evaluates to false.
 *
 * @package WooCommerce Admin/Classes;
 */

namespace Automattic\WooCommerce\Admin\RemoteInboxNotifications;

defined( 'ABSPATH' ) || exit;

/**
 * Rule processor that passes.
 */
class PassRuleProcessor {
	/**
	 * Passes the rule.
	 *
	 * @param object $rule The specific rule being processed by this rule processor.
	 * @param object $data Remote inbox notifications data.
	 *
	 * @return bool Always true.
	 */
	public function process( $rule, $data ) {
		return true;
	}
}
