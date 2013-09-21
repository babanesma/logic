<?php

class Logic_Circuit
{

    protected $inputs;
    protected $outputs;
    protected $table = null;

    /**
     *
     * @var Logic_Condition[]
     */
    protected $conditions;

    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
        return $this;
    }

    public function getInputs()
    {
        return $this->inputs;
    }

    public function addInput($input)
    {
        $this->inputs[] = $input;
        return $this;
    }

    public function setOuputs($outputs)
    {
        $this->outputs = $outputs;
        return $this;
    }

    public function getOuputs()
    {
        return $this->outputs;
    }

    public function addOutput($output)
    {
        $this->outputs[] = $output;
        return $this;
    }

    public function setConditions($conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }

    public function getConditions()
    {
        return $this->conditions;
    }

    public function addCondition($condition)
    {
        $this->conditions[] = $condition;
        return $this;
    }

    public function run($inputValue)
    {
        $inputValues = func_get_args();

        foreach($this->conditions as $condition){
            if($this->testConditionWithInputValues($condition , $inputValues))
                return $condition->getOutput();
        }
        throw new Exception("Values are not correct");
    }

    protected function testConditionWithInputValues($condition , $inputValues)
    {   
        $conditionInputValues = $condition->getInputValues();
        foreach($inputValues as $ivalue){
            $key = $ivalue->getKey();
            if(array_key_exists($key, $conditionInputValues)){
                if( ! $ivalue->toArray() == $conditionInputValues[$key]->toArray()) {
                    return false;       
                }
            } else {
                return false;
            }
        }
        return true;
    }

}