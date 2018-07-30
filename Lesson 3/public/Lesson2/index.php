
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Документ без названия</title>
</head>

<body>
<?php
abstract class Goods {
   abstract protected function getValue();
    public function value() {
        echo $this->getValue() . "<br>";
    }
}
class Digital extends Goods {
    public $price = 5;
    protected function getValue() {
        return $this->price;
    }
}
class Tipical extends Goods{
    public $price2;
    protected function getValue() {
        return $this->price2;
    }
}
class Weith extends Goods{
    public $price3;
    public $weigth;
    protected function getValue() {
        return $this->price3 * $this->weigth;
    }
}
$obj1 = new Digital();
$obj1->value();
$obj2 =new Tipical();
$obj2->price2 = $obj1->price*2;
$obj2->value();
$obj3 = new Weith();
$obj3->price3 = 3;
$obj3->weigth = 4;
$obj3->value();


?>


</body>
</html>




