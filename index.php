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

/**
 * Class Good Содержание товара
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
    public $currency = "0";
    public $storeAmmont = 0;
    public $umt = "0";

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

    public function umt()
    {
        $umt = 0;
        switch ($this->umt) {
            case "0" :
                $umt = "шт.";
                break;
            case "1" :
                $umt = "метр.";
                break;
            case "2" :
                $umt = "кг.";
                break;
            case "3" :
                $umt = "литр.";
                break;
        }
        return $umt;
    }

    public function currency()
    {
        $cur = 0;
        switch ($this->currency) {
            case "0" :
                $cur = "ք";
                break;
            case "1" :
                $cur = "€";
                break;
            case "2" :
                $cur = "$";
                break;

        }
        return $cur;
    }


}


$boots = new Good();
$boots->name = 'Ботинок большой';
$boots->id = 1;
$boots->article = 1;
$boots->price = 100;
$boots->discount = 10;
$boots->storeAmmont = 5;
$boots->umt = 0;
$boots->currency = 1;

class Meat extends Good {

    public $weight = 0;

    public function storePrice()
    {

        return $this->finalPrice() * $this->weight;
    }

}

$meat = new Meat();
$meat->name = 'Мясо';
$meat->id = 2;
$meat->price = 200;
$meat->discount = 0;
$meat->weight = 5.5;
$meat->umt = 2;
$meat->currency = 0;

echo "<pre>";
echo "название товара: " . $boots->name . "</br>";
echo "цена товара: " . $boots->price . " " . $boots->currency() . "</br>";
echo "скидка на товар: " . $boots->discount . "%</br>";
echo "цена со скидкой: " . $boots->finalPrice() . " " . $boots->currency() . "</br>";
echo "колличество товара на складе: " . $boots->storeAmmont . " " . $boots->umt() . "</br>";
echo "стоимость товара на складке: " . $boots->storePrice() . " " . $boots->currency() . "</br>"."</br>";

echo "название товара: " . $meat->name . "</br>";
echo "цена товара: " . $meat->price . " " . $meat->currency() . "</br>";
echo "скидка на товар: " . $meat->discount . "%</br>";
echo "цена со скидкой: " . $meat->finalPrice() . " " . $meat->currency() . "</br>";
echo "колличество товара на складе: " . $meat->weight . " " . $meat->umt() . "</br>";
echo "стоимость товара на складке: " . $meat->storePrice() . " " . $meat->currency() . "</br>";





echo "</pre>";


/**
 * Class A Домашка 5
 */

class A
{

    private $x = 0;

    public function foo()
    {

        echo ++$this->$x;
    }
}

$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();


/**
 * Class A1 Домашка  6
 */

class A1
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A1
{
}

$a1 = new A1();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();


/**
 * Class A2 Домашка 7
 */

class A2
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

class B1 extends A2
{
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

