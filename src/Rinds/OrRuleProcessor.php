<?php
/**
 * Rule processor that performs an OR operation on the rule's left and right
 * operands.
 *
 * @package WooCommerce Admin/Classes
 */

namespace Automattic\WooCommerce\Admin\Rinds;

defined( 'ABSPATH' ) || exit;

/**
 * Rule processor that performs an OR operation on the rule's left and right
 * operands.
 */
class OrRuleProcessor {
	/**
	 * Constructor.
	 *
	 * @param RuleEvaluator $rule_evaluator The rule evaluator to use.
	 */
	public function __construct( $rule_evaluator ) {
		$this->rule_evaluator = $rule_evaluator;
	}

	/**
	 * Performs an OR operation on the rule's left and right operands.
	 *
	 * @param object $rule The specific rule being processed by this rule processor.
	 *
	 * @return bool The result of the operation.
	 */
	public function process( $rule ) {
		foreach ( $rule->operands as $operand ) {
			$evaluated_operand = $this->rule_evaluator->evaluate( $operand );

			if ( $evaluated_operand ) {
				return true;
			}
		}

		return false;
	}
}
