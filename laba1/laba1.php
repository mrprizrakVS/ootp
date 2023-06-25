<?php

// Абстрактний клас, що представляє продукт

abstract class Product
{
    /**
     * @return mixed
     */
    abstract public function operation();
}

// Конкретний продукт A

class ConcreteProductA extends Product
{
    /**
     * @return string
     */
    public function operation(): string
    {
        return "Результат роботи продукту A";
    }
}

// Конкретний продукт B

class ConcreteProductB extends Product
{
    /**
     * @return string
     */
    public function operation(): string
    {
        return "Результат роботи продукту B";
    }
}

// Абстрактний клас фабрики

abstract class Creator
{
    /**
     * @return Product
     */
    abstract public function factoryMethod(): Product;

    /**
     * @return mixed
     */
    public function someOperation()
    {
// Використання фабричного методу для отримання продукту
        $product = $this->factoryMethod();

// Використання отриманого продукту
        $result = $product->operation();

        return $result;
    }
}

// Конкретна фабрика для продукту A

class ConcreteCreatorA extends Creator
{
    /**
     * @return Product
     */
    public function factoryMethod(): Product
    {
        return new ConcreteProductA();
    }
}

// Конкретна фабрика для продукту B

class ConcreteCreatorB extends Creator
{
    /**
     * @return Product
     */
    public function factoryMethod(): Product
    {
        return new ConcreteProductB();
    }
}

// Приклад використання фабричного методу

// Створення фабрики для продукту A
$creatorA = new ConcreteCreatorA();
$resultA = $creatorA->someOperation();
echo $resultA . "\n"; // Результат роботи продукту A

// Створення фабрики для продукту B
$creatorB = new ConcreteCreatorB();
$resultB = $creatorB->someOperation();
