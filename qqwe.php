<?php
class TestPhp
{
    public $name = 'Dima';
    public $address = array(
        'street'=>"voli",
        'bld'=>'1',
        'room'=>'45',
    );
    public function __get($param)
    {
        return $this->address[$param];
    }
    public function __call($name, $arguments)
    {
        return 
    }
}

$res = new TestPhp();
echo $res->name;
echo $res->street;

