<?php


class RangeTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new \Badtomcat\Validator\RangeValidator();
        $validator->range = array('foo','bar','lol');

        $this->assertTrue($validator->validate('foo'));

        $this->assertTrue($validator->validate('bar'));
        $this->assertFalse($validator->validate('fff'));
        $this->assertFalse($validator->validate('weds'));

	}
}

