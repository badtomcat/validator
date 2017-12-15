<?php


class DateTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new \Badtomcat\Validator\DateValidator();
        $validator->setDatetimeMode();
        $this->assertTrue($validator->validate('2017-12-15 12:12:12'));
        $this->assertTrue($validator->validate('2017/12/15 12:12:12'));
        $this->assertTrue($validator->validate('2017/09/15 12:12:12'));
        $this->assertTrue($validator->validate('2017/9/15 12:02:12'));
        $this->assertTrue($validator->validate('2017/9/5 12:2:12'));

        $this->assertFalse($validator->validate('2017-12-15/12:12:12'));


        $validator->setDateMode();
        $this->assertTrue($validator->validate('2017-12-15'));
        $this->assertTrue($validator->validate('2017/01/15'));
        $this->assertTrue($validator->validate('2017/1/5'));

        $validator->setTimeMode();
        $this->assertTrue($validator->validate('12:12:12'));
        $this->assertTrue($validator->validate('1:0:0'));


        $validator->setYearMode();
        $this->assertTrue($validator->validate('1000'));
        $this->assertTrue($validator->validate('5555'));
        $this->assertFalse($validator->validate('123'));
        $this->assertFalse($validator->validate('12345'));
	}
}

