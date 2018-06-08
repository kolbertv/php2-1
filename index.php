<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08.06.2018
 * Time: 16:17
 */

class Good
{
    public $id;
    public $name = null;
    public $article = null;
    public $gender = null;
    public $color = null;
    public $sizes = [];
    public $constituent = [];
    public $discount = 0;
    public $price = 0;
    public $currency = "руб";
    public $storeAmmont = 0;
    public $umt = "";

    public function finalPrice()
    {
        if ($this->discount == 0) {

            return $this->price;
        } else {

            return ($this->price - ($this->price * $this->discount) / 100);
        }
    }

    public function storePrice()
    {

        return $this->finalPrice() * $this->storeAmmont;


    }


}


$boots = new Good();
$boots->id = 1;
$boots->article = 1;
$boots->price = 100;
$boots->discount = 10;
$boots->storeAmmont = 5;
$boots->umt = 'штук';

echo "<pre>";
echo "цена товара: " . $boots->price . " " . $boots->currency . "</br>";
echo "скидка на товар: " . $boots->discount . "%</br>";
echo "цена со скидкой: " . $boots->finalPrice() . " " . $boots->currency . "</br>";
echo "колличество товара на складе: " . $boots->storeAmmont . " " . $boots->umt . "</br>";
echo "стоимость товара на складке: " . $boots->storePrice() . " " . $boots->currency . "</br>";


echo "</pre>";


class A {

    private $x = 0;
    public function foo() {

        echo ++$this->$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

class A1 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A1 {
}
$a1 = new A1();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

class A2 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B1 extends A2 {
}
$a1 = new A2;
$b1 = new B1;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();


?>


</body>
</html>

