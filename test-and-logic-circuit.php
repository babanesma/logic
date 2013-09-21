<?php

error_reporting(E_ALL);
ini_set("display_errors" , true);
ini_set("html_errors" , "On");

function __autoload($name)
{
	$name = str_replace("_", "/", $name);
    require_once 'lib/' . $name . '.php';
}

$inputA = new Logic_Input("A");
$inputA->addValue(0, 0);
$inputA->addValue(1, 1);

$inputB = new Logic_Input("B");
$inputB->addValue(0, 0);
$inputB->addValue(1, 1);

$outputTrue = new Logic_Output("True", TRUE);
$outputFalse = new Logic_Output("False", FALSE);

$condition1 = new Logic_Condition();
$condition1->addInputValue($inputA->getInputValueByCode(0));
$condition1->addInputValue($inputB->getInputValueByCode(0));
$condition1->setOutput($outputFalse);

$condition2 = new Logic_Condition();
$condition2->addInputValue($inputA->getInputValueByCode(0));
$condition2->addInputValue($inputB->getInputValueByCode(1));
$condition2->setOutput($outputFalse);

$condition3 = new Logic_Condition();
$condition3->addInputValue($inputA->getInputValueByCode(1));
$condition3->addInputValue($inputB->getInputValueByCode(0));
$condition3->setOutput($outputFalse);

$condition4 = new Logic_Condition();
$condition4->addInputValue($inputA->getInputValueByCode(1));
$condition4->addInputValue($inputB->getInputValueByCode(1));
$condition4->setOutput($outputTrue);

$circuit = new Logic_Circuit(); 
$circuit->addInput($inputA);
$circuit->addInput($inputB);
$circuit->addOutput($outputTrue);
$circuit->addOutput($outputFalse);
$circuit->addCondition($condition1);
$circuit->addCondition($condition2);
$circuit->addCondition($condition3);
$circuit->addCondition($condition4);


// test the circuit
$output = $circuit->run($inputA->getInputValueByCode(1) , $inputB->getInputValueByCode(1));
var_dump($output); // should be true

