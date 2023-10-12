<?php 
class Calculator {
    private $firstNumber = '';
    private $secondNumber = '';
    private $total = '';
    private $operator = '';
    private $operators = ['+', '-', '*', '/'];

    public function checkInput($input) {
        foreach(str_split($input) as $element) {
            if (is_numeric($element) || in_array($element, $this->operators)) {
                continue;
            } else {
                return false;
            }
        }
        return true;
    }

    public function performCalculation() {
        switch($this->operator) {
            case '+':
                $this->total = ((int)$this->firstNumber + (int)$this->secondNumber);
                break;
            case '-':
                $this->total = ((int)$this->firstNumber - (int)$this->secondNumber);
                break;
            case '/':
                try {
                    $this->total = ((int)$this->firstNumber / (int)$this->secondNumber);
                } catch (DivisionByZeroError $e) {
                    $this->total = "Syntax Error";
                }
                
                break;
            case '*':
                $this->total = ((int)$this->firstNumber * (int)$this->secondNumber);
                break;
        }
    }

    public function calculate($input) {
        foreach(str_split($input) as $key=>$value) {
            if (in_array($value, $this->operators)) {
                if ($this->operator == '') {
                    $this->operator = $value;
                } else {
                    $this->performCalculation();
                    $this->firstNumber = $this->total;
                    $this->secondNumber = '';
                    $this->operator = $value;
                }
            } else {
                if ($this->operator == '') {
                    $this->firstNumber .= $value;
                } else {
                    $this->secondNumber .= $value;
                    
                    if ($key == strlen($input) - 1) {
                        $this->performCalculation();
                    }
                }
            }
        }
        return $this->total;
    }

    public function clear() {
        $this->firstNumber = '';
        $this->secondNumber = '';
        $this->total = 0;
        $this->operator = '';
        $this->operators = ['+', '-', '*', '/'];
    }
}
?>
