<?php


class StringTest extends PHPUnit_Framework_TestCase {

	public function testBool() {
        $validator = new \Badtomcat\Validator\UrlValidator();


        $this->assertTrue($validator->validate('http://www.baidu.com/a?b=c'));

        $this->assertFalse($validator->validate('b'));



	}
}

