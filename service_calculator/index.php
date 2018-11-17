<?php
class Numbers
{
    protected $num1;
    protected $num2;
    protected $num3;
    protected $num4;
    protected $func;
    protected function setNum1()
    {
        if (isset($_GET['num1']))
            $this->num1 = (int)$_GET['num1'];
        else if (isset($_POST['num1']))
            $this->num1 = (int)$_POST['num1'];
        else $this->num1 = 0;
    }
    protected function setNum2()
    {
        if (isset($_GET['num2']))
            $this->num2 = (int)$_GET['num2'];
        else if (isset($_POST['num2']))
            $this->num2 = (int)$_POST['num2'];
        else $this->num2 = 0;
    }
    protected function setNum3()
    {
        if (isset($_GET['num3']))
            $this->num3 = (int)$_GET['num3'];
        else if (isset($_POST['num3']))
            $this->num3 = (int)$_POST['num3'];
        else $this->num3 = 0;
    }
    protected function setNum4()
    {
        if (isset($_GET['num4']))
            $this->num4 = (int)$_GET['num4'];
        else if (isset($_POST['num4']))
            $this->num4 = (int)$_POST['num4'];
        else $this->num4 = 0;
    }
    protected function setFunc()
    {
        if (isset($_GET['func']))
            $this->func = $_GET["func"];
        else if (isset($_POST['func']))
            $this->func = $_POST["func"];
        else
            $this->func = "error";
    }
}
Class Calculator extends Numbers {
    protected $result;
    public function __construct()
    {
        $this->setNum1();
        $this->setNum2();
        $this->setNum3();
        $this->setNum4();
        $this->setFunc();
        $this->calc();
    }
    public function calc()
    {
        if($this->func == 'sum')
            $this->result = $this->num1 + $this->num2 + $this->num3 + $this->num4;
        else if($this->func == 'avg')
            $this->result  = ($this->num1 + $this->num2 + $this->num3 + $this->num4)/3;
        else if($this->func == 'multi')
            $this->result = $this->num1 * $this->num2 * $this->num3 * $this->num4;
        else{
            $this->result = 'error';
        }
    }
    public function getResult() {
        return $this->result;
    }
}
$calc = new Calculator();
if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $a = array('retVal'=>"PUT was detected");
    header('Content-Type: application/json');
    echo json_encode($a);
}
else{
    $a = array('retVal'=>$calc->getResult());
    header('Content-Type: application/json');
    echo json_encode($a);
}
?>