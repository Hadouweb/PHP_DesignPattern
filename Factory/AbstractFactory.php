<?php

namespace Factory;

interface Vehicle
{
    public function drive(): void;
}

interface VehicleFactory
{
    public function createCar(): Vehicle;
    public function createMotorcycle(): Vehicle;
}

class Car implements Vehicle
{
    public function drive(): void
    {
        echo "Driving a car...\n";
    }
}

class Motorcycle implements Vehicle
{
    public function drive(): void
    {
        echo "Riding a motorcycle...\n";
    }
}

class ConcreteVehicleFactory implements VehicleFactory
{
    public function createCar(): Vehicle
    {
        return new Car();
    }

    public function createMotorcycle(): Vehicle
    {
        return new Motorcycle();
    }
}

class Client
{
    private $car;
    private $motorcycle;

    public function __construct(VehicleFactory $factory)
    {
        $this->car = $factory->createCar();
        $this->motorcycle = $factory->createMotorcycle();
    }

    public function drive()
    {
        $this->car->drive();
        $this->motorcycle->drive();
    }
}

$factory = new ConcreteVehicleFactory();
$client = new Client($factory);
$client->drive();