<?php
/**
 * Rule processor for publishing based on the number of orders.
 *
 * @package WooCommerce Admin/Classes;
 */

namespace Automattic\WooCommerce\Admin\RemoteInboxNotifications;

defined( 'ABSPATH' ) || exit;

/**
 * Rule processor for publishing based on the number of orders.
 */
class OrderCountRuleProcessor {
	/**
	 * Constructor.
	 *
	 * @param object $orders_provider The orders provider.
	 */
	public function __construct( $orders_provider ) {
		$this->orders_provider = $orders_provider;
	}

	/**
	 * Process the rule.
	 *
	 * @param object $rule The specific rule being processed by this rule processor.
	 * @param object $data Remote Inbox Notifications data.
	 *
	 * @return bool Whether the rule passes or not.
	 */
	public function process( $rule, $data ) {
		$count = $this->orders_provider->get_order_count();

		return ComparisonOperation::compare(
			$count,
			$rule->value,
			$rule->operation
		);
	}
}
