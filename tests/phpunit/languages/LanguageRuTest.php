<?php
/**
 * @author Amir E. Aharoni
 * based on LanguageBe_tarask.php
 * @copyright Copyright © 2012, Amir E. Aharoni
 * @file
 */

/** Tests for MediaWiki languages/classes/LanguageRu.php */
class LanguageRuTest extends LanguageClassesTestCase {
	/** @dataProvider providePlural */
	function testPlural( $result, $value ) {
		$forms = array( 'one', 'few', 'many', 'other' );
		$this->assertEquals( $result, $this->getLang()->convertPlural( $value, $forms ) );
	}

	/** @dataProvider providePlural */
	function testGetPluralRuleType( $result, $value ) {
		$this->assertEquals( $result, $this->getLang()->getPluralRuleType( $value ) );
	}

	public static function providePlural() {
		return array (
			array( 'one', 1 ),
			array( 'many', 11 ),
			array( 'one', 91 ),
			array( 'one', 121 ),
			array( 'few', 2 ),
			array( 'few', 3 ),
			array( 'few', 4 ),
			array( 'few', 334 ),
			array( 'many', 5 ),
			array( 'many', 15 ),
			array( 'many', 120 ),
		);
	}

	/** @dataProvider providePluralTwoForms */
	function testPluralTwoForms( $result, $value ) {
		$forms =  array( 'one', 'other' );
		$this->assertEquals( $result, $this->getLang()->convertPlural( $value, $forms ) );
	}

	public static function providePluralTwoForms() {
		return array(
			array( 'one', 1 ),
			array( 'other', 11 ),
			array( 'other', 91 ),
			array( 'other', 121 ),
		);
	}

	/** @dataProvider providerGrammar */
	function testGrammar( $result, $word, $case ) {
		$this->assertEquals( $result, $this->getLang()->convertGrammar( $word, $case ) );
	}

	public static function providerGrammar() {
		return array(
			array(
				'Википедии',
				'Википедия',
				'genitive',
			),
			array(
				'Викитеки',
				'Викитека',
				'genitive',
			),
			array(
				'Викитеке',
				'Викитека',
				'prepositional',
			),
			array(
				'Викиданных',
				'Викиданные',
				'prepositional',
			),
		);
	}
}
