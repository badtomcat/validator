<?php

use Badtomcat\Validator\BooleanValidator;

class BoolTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new BooleanValidator();
        $this->assertTrue($validator->validate(1));

        $validator->strict = true;
        $this->assertFalse($validator->validate(1));
	}
}

