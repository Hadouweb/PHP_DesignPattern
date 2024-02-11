<?php

namespace Factory;

abstract class Factory
{
    abstract public function factoryMethod(): Product;

    public function someOperation(): string
    {
        $product = $this->factoryMethod();
        $result = "Creator: The same creator's code has just worked with : " . $product->operation();

        return $result;
    }
}

class Concrete1 extends Factory
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct1();
    }
}

class Concrete2 extends Factory
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct2();
    }
}

interface Product
{
    public function operation(): string;
}

class ConcreteProduct1 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct1}";
    }
}

class ConcreteProduct2 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct2}";
    }
}

function clientCode(Factory $factory)
{
    echo "Client: I'm not aware of the creator's class, but it still works.\n"
        . $factory->someOperation();
}

echo "App: Launched with the Concrete1.\n";
clientCode(new Concrete1());
echo "\n\n";

echo "App: Launched with the Concrete2.\n";
clientCode(new Concrete2());