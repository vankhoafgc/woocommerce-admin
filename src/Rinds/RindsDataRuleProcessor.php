<?php
/**
 * Rule processor that performs a comparison operation against a value in the
 * $data object.
 *
 * @package WooCommerce Admin/Classes
 */

namespace Automattic\WooCommerce\Admin\Rinds;

defined( 'ABSPATH' ) || exit;

/**
 * Rule processor that performs a comparison operation against a value in the
 * $data object.
 */
class RindsDataRuleProcessor {
	/**
	 * Performs a comparison operation against a value in the $data object.
	 *
	 * @param object $rule The specific rule being processed by this rule processor.
	 * @param object $data RINDS data.
	 *
	 * @return bool The result of the operation.
	 */
	public function process( $rule, $data ) {
		if ( ! isset( $data->{$rule->index} ) ) {
			return false;
		}

		$operand = $data->{$rule->index};

		switch ( $rule->operation ) {
			case '=':
				return $operand === $rule->value;
			case '<':
				return $operand < $rule->value;
			case '<=':
				return $operand <= $rule->value;
			case '>':
				return $operand > $rule->value;
			case '>=':
				return $operand >= $rule->value;
			case '!=':
				return $operand !== $rule->value;
		}

		return false;
	}
}
