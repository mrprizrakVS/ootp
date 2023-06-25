<?php

// Базовий інтерфейс компонента
interface ComponentInterface
{
    /**
     * @return string
     */
    public function operation(): string;
}

// Конкретний компонент
class ConcreteComponent implements ComponentInterface
{
    /**
     * @return string
     */
    public function operation(): string
    {
        return "ConcreteComponent";
    }
}

// Базовий декоратор
abstract class Decorator implements ComponentInterface
{
    /**
     * @var ComponentInterface
     */
    protected $component;

    /**
     * @param ComponentInterface $component
     */
    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }

    /**
     * @return string
     */
    public function operation(): string
    {
        return $this->component->operation();
    }
}

// Конкретний декоратор 1
class ConcreteDecoratorA extends Decorator
{
    /**
     * @return string
     */
    public function operation(): string
    {
        return "ConcreteDecoratorA(" . parent::operation() . ")";
    }
}

// Конкретний декоратор 2
class ConcreteDecoratorB extends Decorator
{
    /**
     * @return string
     */
    public function operation(): string
    {
        return "ConcreteDecoratorB(" . parent::operation() . ")";
    }
}

// Використання
$component = new ConcreteComponent();
$decoratorA = new ConcreteDecoratorA($component);
$decoratorB = new ConcreteDecoratorB($decoratorA);

$result = $decoratorB->operation();
echo $result. "\n"; // Виводиться: ConcreteDecoratorB(ConcreteDecoratorA(ConcreteComponent))


// Інтерфейс, який очікує клієнт
interface TargetInterface
{
    /**
     * @return string
     */
    public function request(): string;
}

// Адаптований клас
class Adaptee
{
    /**
     * @return string
     */
    public function specificRequest(): string
    {
        return "Adaptee";
    }
}

// Адаптер
class Adapter implements TargetInterface
{
    /**
     * @var Adaptee
     */
    protected $adaptee;

    /**
     * @param Adaptee $adaptee
     */
    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    /**
     * @return string
     */
    public function request(): string
    {
        return "Adapter(" . $this->adaptee->specificRequest() . ")";
    }
}

// Використання
$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);

$result = $adapter->request();
echo $result; // Виводиться: Adapter(Adaptee)
