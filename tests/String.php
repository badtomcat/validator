<?php


class StringTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new \Badtomcat\Validator\StringValidator();

        $validator->max = 8;
        $validator->min = 2;
        $this->assertTrue($validator->validate('foo'));

        $this->assertFalse($validator->validate('b'));
        $this->assertFalse($validator->validate('123456789'));

        $validator->is = "/^\d+$/";
        $this->assertTrue($validator->validate('123'));
        $this->assertFalse($validator->validate('dad'));


	}
}

