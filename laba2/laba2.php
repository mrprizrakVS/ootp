<?php
// Абстрактний клас Прототип
abstract class Prototype
{
    /**
     * @var
     */
    protected $name;

    /**
     * @return Prototype
     */
    abstract public function clone(): Prototype;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

// Конкретний клас Прототипу
class ConcretePrototype extends Prototype
{
    /**
     * @return Prototype
     */
    public function clone(): Prototype
    {
        $clone = new ConcretePrototype();
        $clone->setName($this->getName());
        return $clone;
    }
}

// Використання Прототипу
$prototype = new ConcretePrototype();
$prototype->setName("Прототип 1");

// Клонування Прототипу
$clone = $prototype->clone();
$clone->setName("Клон Прототипу 1");

// Виведення результатів
echo "Оригінал: " . $prototype->getName() . "\n";
echo "Клон: " . $clone->getName() . "\n";
