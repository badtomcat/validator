<?php


class RegexpTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new \Badtomcat\Validator\RegularExpressionValidator();
        $validator->pattern = "/^\d+$/";

        $this->assertTrue($validator->validate('123'));

        $this->assertTrue($validator->validate('1265421'));
        $this->assertFalse($validator->validate('f1sd231ff'));
        $this->assertFalse($validator->validate('weds'));

        $validator->pattern = "/^\w+$/";
        $this->assertTrue($validator->validate('123'));

        $this->assertTrue($validator->validate('12_65421'));
        $this->assertTrue($validator->validate('_f1sd231ff'));
        $this->assertFalse($validator->validate('we.ds'));
	}
}

