<?php

/**
 * @date 2017/7/10 13:38:45
 */

namespace Badtomcat\Validator;

class DateValidator extends Validator
{
    const MODE_DATETIME = 0;
    const MODE_DATE = 1;
    const MODE_TIME = 2;
    const MODE_YEAR = 3;
    /**
     *
     * @var string datetime/date/time/year
     */
    public $mode = DateValidator::MODE_DATETIME;

    /**
     * @return $this
     */
    public function setDatetimeMode()
    {
        $this->mode = self::MODE_DATETIME;
        return $this;
    }

    /**
     * @return $this
     */
    public function setDateMode()
    {
        $this->mode = self::MODE_DATE;
        return $this;
    }


    /**
     * @return $this
     */
    public function setTimeMode()
    {
        $this->mode = self::MODE_TIME;
        return $this;
    }


    /**
     * @return $this
     */
    public function setYearMode()
    {
        $this->mode = self::MODE_YEAR;
        return $this;
    }


    /**
     * @inheritdoc
     */
    public function validate($value)
    {
        switch ($this->mode) {
            case DateValidator::MODE_DATETIME:
                return !!preg_match("/^\d{4}[\-\/]\d\d?[\-\/]\d\d? \d\d?:\d\d?:\d\d?$/", $value);
            case DateValidator::MODE_DATE:
                return !!preg_match("/^\d{4}[\-\/]\d\d?[\-\/]\d\d?$/", $value);
            case DateValidator::MODE_TIME:
                return !!preg_match("/^(0?[0-9]|[1-6][0-9]):(0?[0-9]|[1-6][0-9]):(0?[0-9]|[1-6][0-9])$/", $value);
            case DateValidator::MODE_YEAR:
                return !!preg_match("/^\d{4}$/", $value);
            default:
                break;
        }
        return true;
    }
}
