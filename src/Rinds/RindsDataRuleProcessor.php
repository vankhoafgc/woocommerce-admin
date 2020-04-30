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
	 * Performs an OR operation on the rule's left and right operands.
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

		if ( '=' === $rule->operation ) {
			return $operand === $rule->value;
		} elseif ( '<' === $rule->operation ) {
			return $operand < $rule->value;
		} elseif ( '<=' === $rule->operation ) {
			return $operand <= $rule->value;
		} elseif ( '>' === $rule->operation ) {
			return $operand > $rule->value;
		} elseif ( '>=' === $rule->operation ) {
			return $operand >= $rule->value;
		} elseif ( '!=' === $rule->operation ) {
			return $operand !== $rule->value;
		}

		return false;
	}
}
