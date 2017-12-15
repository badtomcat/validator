<?php

/**
 * @date 2017/7/10 17:19:45
 */
namespace Badtomcat\Validator;

class StringValidator extends Validator {
	/**
	 *
	 * @var integer maximum length. Defaults to null, meaning no maximum limit.
	 */
	public $max;
	/**
	 *
	 * @var integer minimum length. Defaults to null, meaning no minimum limit.
	 */
	public $min;
	/**
	 *
	 * @var integer exact length. Defaults to null, meaning no exact length limit.
	 */
	public $is;
	/**
	 *
	 * @var string user-defined error message used when the value is too long.
	 */
	public $tooShort;
	/**
	 *
	 * @var string user-defined error message used when the value is too short.
	 */
	public $tooLong;
	/**
	 *
	 * @var boolean whether the attribute value can be null or empty. Defaults to true,
	 *      meaning that if the attribute is empty, it is considered valid.
	 */
	public $allowEmpty = true;
	/**
	 *
	 * @var string the encoding of the string value to be validated (e.g. 'UTF-8').
	 *      Setting this property requires you to enable mbstring PHP extension.
	 *      The value of this property will be used as the 2nd parameter of the mb_strlen() function.
	 *      Defaults to false, which means the strlen() function will be used for calculating the length
	 *      of the string.
	 * @since 1.1.1
	 */
	public $encoding = false;
	
	/**
	 * @inheritdoc
	 */
	public function validate($value) {
		if ($this->allowEmpty && $this->isEmpty ( $value ))
			return true;
		if ($this->encoding !== false && function_exists ( 'mb_strlen' ))
			$length = mb_strlen ( $value, $this->encoding );
		else
			$length = strlen ( $value );
		if ($this->min !== null && $length < $this->min) {
			$this->message = strtr ( '{attribute} is too short (minimum is {min} characters).', array (
					'{min}' => $this->min 
			) );
			return false;
		}
		if ($this->max !== null && $length > $this->max) {
			$this->message = strtr ( '{attribute} is too long (maximum is {max} characters).', array (
					'{max}' => $this->max 
			) );
			return false;
		}
		if ($this->is !== null && $length !== $this->is) {
			$this->message = strtr ( '{attribute} is of the wrong length (should be {length} characters).', array (
					'{length}' => $this->is 
			) );
			return false;
		}
		return true;
	}
}

