<?php
/**
 * Not rule processor tests.
 *
 * @package WooCommerce\Tests\Rinds
 */

use Automattic\WooCommerce\Admin\Rinds\NotRuleProcessor;
use Automattic\WooCommerce\Admin\Rinds\RuleEvaluator;

/**
 * class WC_Tests_Rinds_NotTimeRuleProcessor
 */
class WC_Tests_Rinds_NotTimeRuleProcessor extends WC_Unit_Test_Case {
	/**
	 * An empty operand evaluates to false, so negating that should
	 * evaluate to true.
	 *
	 * @group fast
	 */
	public function test_spec_passes_for_empty_operand() {
		$get_rule_processor = new MockGetRuleProcessor();
		$processor          = new NotRuleProcessor(
			new RuleEvaluator(
				$get_rule_processor
			)
		);
		$rule               = json_decode(
			'{
				"type": "not",
				"operand": []
			}'
		);

		$result = $processor->process( new stdClass(), $rule );

		$this->assertEquals( true, $result );
	}

	/**
	 * Operand that evaluates to true negated to false.
	 *
	 * @group fast
	 */
	public function test_spec_fails_for_passing_operand() {
		$get_rule_processor = new MockGetRuleProcessor();
		$processor          = new NotRuleProcessor(
			new RuleEvaluator(
				$get_rule_processor
			)
		);
		$rule               = json_decode(
			'{
				"type": "not",
				"operand": [
					{
						"type": "send_at_time",
						"send_at": "2020-04-24 09:00:00"
					}
				]
			}'
		);

		$result = $processor->process( new stdClass(), $rule );

		$this->assertEquals( false, $result );
	}

	/**
	 * Operand that evaluates to false negated to true.
	 *
	 * @group fast
	 */
	public function test_spec_passes_for_failing_operand() {
		$get_rule_processor = new MockGetRuleProcessor();
		$processor          = new NotRuleProcessor(
			new RuleEvaluator(
				$get_rule_processor
			)
		);
		$rule               = json_decode(
			'{
				"type": "not",
				"operand": [
					{
						"type": "send_at_time",
						"send_at": "2020-04-24 11:00:00"
					}
				]
			}'
		);

		$result = $processor->process( new stdClass(), $rule );

		$this->assertEquals( true, $result );
	}
}