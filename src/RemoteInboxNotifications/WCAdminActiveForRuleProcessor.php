<?php
/**
 * Rule processor for publishing if wc-admin has been active for at least the
 * given number of seconds.
 *
 * @package WooCommerce Admin/Classes;
 */

namespace Automattic\WooCommerce\Admin\RemoteInboxNotifications;

defined( 'ABSPATH' ) || exit;

/**
 * Rule processor for publishing if wc-admin has been active for at least the
 * given number of seconds.
 */
class WCAdminActiveForRuleProcessor {
	/**
	 * Constructor
	 *
	 * @param object $wcadmin_active_for_provider Provides the amount of time wcadmin has been active for.
	 */
	public function __construct( $wcadmin_active_for_provider ) {
		$this->wcadmin_active_for_provider = $wcadmin_active_for_provider;
	}

	/**
	 * Performs a comparison operation against the amount of time wc-admin has
	 * been active for in days.
	 *
	 * @param object $rule The specific rule being processed by this rule processor.
	 * @param object $data Remote inbox notifications data.
	 *
	 * @return bool The result of the operation.
	 */
	public function process( $rule, $data ) {
		$active_for_seconds = $this->wcadmin_active_for_provider->get_wcadmin_active_for_in_seconds();
		$rule_seconds       = $rule->days * 24 * 60 * 60;

		return ComparisonOperation::compare(
			$rule_seconds,
			$active_for_seconds,
			$rule->operation
		);
	}
}
