<?php


class EmailTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new \Badtomcat\Validator\EmailValidator();
        $this->assertTrue($validator->validate('123@qq.com'));
        $this->assertFalse($validator->validate('2017/12/15 12:12:12'));
	}
}

