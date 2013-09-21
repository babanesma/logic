<?php

class Logic_Input
{

    protected $inputValues;
    protected $name;

    public function __construct($name = null)
    {
        if (isset($name) && is_string($name))
            $this->name = $name;
        else
            throw new Exception("Input name must me string");
        $this->inputValues = array();
    }

    public function addValue($value, $code)
    {
        if (!is_int($code))
            throw new Exception("Input value code must be integer");

        if (array_key_exists($code, $this->inputValues))
            throw new Exception("Input value code has been entered before");

        if ($this->oldValue($value))
            throw new Exception("Input value has been entered before");

        $inputValue = new Logic_InputValue($this, $value, $code);
        $this->addInputValue($inputValue);
    }

    public function addInputValue($inputValue)
    {
        $this->inputValues[$inputValue->getCode()] = $inputValue;
        return $this;
    }

    public function getInputValueByCode($code)
    {
        if (!array_key_exists($code, $this->inputValues))
            throw new Exception("The input value with the following code <b>" . $code . "</b>is not existed ");
        return $this->inputValues[$code];
    }

    public function getValues()
    {
        return $this->inputValues;
    }

    public function setValues($values)
    {
        $this->inputValues = $values;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function oldValue($value)
    {
        foreach ($this->inputValues as $v) {
            if ($v->getValue() == $value)
                return true;
        }
        return false;
    }

}