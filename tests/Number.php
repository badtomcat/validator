<?php


class NumberTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new \Badtomcat\Validator\NumberValidator();

        $this->assertTrue($validator->validate(0.12));

        $validator->unsignedOnly = true;
        $this->assertTrue($validator->validate(123));
        $this->assertFalse($validator->validate(-145));
        $this->assertFalse($validator->validate(0.12));

        $validator->unsignedOnly = false;
        $validator->integerOnly = true;
        $this->assertFalse($validator->validate(0.12));
        $this->assertTrue($validator->validate(123));
        $this->assertTrue($validator->validate(-123));

	}
}

