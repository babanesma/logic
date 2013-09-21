<?php

class Logic_Condition
{
    protected $inputValues;
    protected $output;
    
    public function getInputValues()
    {
        return $this->inputValues;
    }
    
    public function setInputValues($inputValues)
    {
        $this->inputValues = $inputValues;
        return $this;
    }
    
    public function addInputValue($inputValue)
    {
        $this->inputValues[$inputValue->getKey()] = $inputValue;
        return $this;
    }
    
    public function getOutput()
    {
        return $this->output;
    }
    
    public function setOutput($output)
    {
        $this->output = $output;
        return $this;
    }
            
}