<?php


class RequiredTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new \Badtomcat\Validator\RequiredValidator();
        $validator->requiredValue = 'foo';

        $this->assertTrue($validator->validate('foo'));

        $this->assertFalse($validator->validate('bar'));

        $validator->requiredValue = null;

        $this->assertTrue($validator->validate(''));
        $this->assertTrue($validator->validate('dad'));


	}
}

