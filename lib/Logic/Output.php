<?php

class Logic_Output
{
    protected $value;
    protected $name;
    
    public function __construct($name = null , $value = null)
    {
        if(isset($name) && is_string($name))
            $this->name = $name;
        
        if(isset($value))
            $this->value = $value;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
}