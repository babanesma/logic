<?php

class Logic_InputValue
{

    protected $input;
    protected $code;
    protected $value;

    public function __construct($input = null, $value = null, $code = null)
    {
        if (isset($input))
            $this->setInput($input);

        if (isset($value))
            $this->setValue($value);

        if (isset($code))
            $this->setCode($code);
    }

    public function setInput($input)
    {
        $this->input = $input;
    }

    public function getInput()
    {
        return $this->input;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function toArray()
    {
        return array(
            "code" => $this->code,
            "value" => $this->value    
        );
    }

    public function getKey()
    {
        return $this->getInput()->getName() . $this->getCode();
    }

}