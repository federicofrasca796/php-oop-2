<!-- SHOP
- Product
- User
- Employee
- Categories
- CreditCard
- Address
- Basket
-->

<?php

class Product
{
    public $name;
    public $description;
    protected $price;
    private $discount;

    function __construct(string $name, float $price, int $discount = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function SetDescription(string $description)
    {
        $this->description = $description;
    }

    public function GetName()
    {
        return $this->name;
    }
    public function GetPrice()
    {
        return $this->price;
    }
}

class User
{
    public $name;
    public $lastname;
    protected $age;
    protected $username;
    private $password;

    function __construct(string $name, string $lastname, int $age, string $username, string $password)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->username = $username;
        $this->password = $password;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setUsername(string $u)
    {
        $this->username = $u;
    }
    public function setPassword(string $pwd)
    {
        $this->password = $pwd;
    }

    public function getFullUser()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function setCreditCard(object $credit)
    {
        $this->credit_card = $credit;
    }
}

class CreditCard
{
    protected $number;
    private $expire;
    private $cvv;
    protected $owner;

    function __construct(string $number, string $expire, int $cvv, string $owner)
    {
        $this->number = $number;
        $this->expire = $expire;
        $this->cvv = $cvv;
        $this->owner = $owner;
    }

    public function getCreditNumber()
    {
        return $this->number;
    }
    public function getCreditExpire()
    {
        return $this->expire;
    }
    public function getCreditCvv()
    {
        return $this->cvv;
    }
    public function getCreditOwner()
    {
        return $this->owner;
    }
}

class UserPremium extends User
{
    public $discount;

    function __construct(string $name, string $lastname, int $age, string $username, string $password)
    {
        parent::__construct($name, $lastname, $age, $username, $password);
    }

    function setDiscount()
    {
        if ($this->age >= 65) {
            $this->discount = 65;
        } else if ($this->age <= 16) {
            $this->discount = 20;
        }
    }
}


$user_1 = new User('Federico', 'Frascà', 25, 'federico.frasca', 'password123');

// var_dump($user_1);
$credit_card_1 = new CreditCard('1234 5678 9123 4567', '12/26', '123', 'Federico Frascà');

$user_1->setCreditCard($credit_card_1);

var_dump($user_1);

//Get user credit card
var_dump($user_1->credit_card->getCreditNumber());
var_dump($user_1->credit_card->getCreditExpire());
var_dump($user_1->credit_card->getCreditCvv());
var_dump($user_1->credit_card->getCreditOwner());



$user_pro = new UserPremium('Marco', 'Pelliciotti', 65, 'marco.pelliciotti', 'pwd234');
$user_pro->setDiscount();
var_dump($user_pro);
