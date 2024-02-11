<?php

namespace Builder;

class House
{
    private $walls;
    private $roof;
    private $windows;
    private $doors;
    private $pool;

    public function setWalls($walls)
    {
        $this->walls = $walls;
    }

    public function setRoof($roof)
    {
        $this->roof = $roof;
    }

    public function setWindows($windows)
    {
        $this->windows = $windows;
    }

    public function setDoors($doors)
    {
        $this->doors = $doors;
    }

    public function setPool($pool)
    {
        $this->pool = $pool;
    }

    public function showHouse()
    {
        echo "House constructed with: \n";
        echo "Walls: {$this->walls}\n";
        echo "Roof: {$this->roof}\n";
        echo "Windows: {$this->windows}\n";
        echo "Doors: {$this->doors}\n";
        if ($this->pool) {
            echo "Pool: {$this->pool}\n";
        }
    }
}

interface HouseBuilder
{
    public function buildWalls();
    public function buildRoof();
    public function buildWindows();
    public function buildDoors();
    public function buildPool();
    public function getHouse(): House;
}

class WoodenHouseBuilder implements HouseBuilder
{
    private $house;

    public function __construct()
    {
        $this->house = new House();
    }

    public function buildWalls()
    {
        $this->house->setWalls("Wooden walls");
    }

    public function buildRoof()
    {
        $this->house->setRoof("Wooden roof");
    }

    public function buildWindows()
    {
        $this->house->setWindows("Wooden windows");
    }

    public function buildDoors()
    {
        $this->house->setDoors("Wooden doors");
    }

    public function buildPool()
    {
        $this->house->setPool("Wooden pool");
    }

    public function getHouse(): House
    {
        return $this->house;
    }
}

class HouseDirector
{
    public function buildHouse(HouseBuilder $builder, bool $hasPool)
    {
        $builder->buildWalls();
        $builder->buildRoof();
        $builder->buildWindows();
        $builder->buildDoors();
        if ($hasPool) {
            $builder->buildPool();
        }
        return $builder->getHouse();
    }
}

$woodenHouseBuilder = new WoodenHouseBuilder();
$houseDirector = new HouseDirector();
$houseWithoutPool = $houseDirector->buildHouse($woodenHouseBuilder, false); // Construire une maison sans piscine
$houseWithoutPool->showHouse();

echo "\n";

$houseWithPool = $houseDirector->buildHouse($woodenHouseBuilder, true); // Construire une maison avec piscine
$houseWithPool->showHouse();