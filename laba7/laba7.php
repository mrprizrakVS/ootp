<?php

// Оригінальний клас, стан якого потрібно зберігати і відновлювати
class Originator
{
    /**
     * @var
     */
    private $state;

    /**
     * @param $state
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return Memento
     */
    public function saveStateToMemento()
    {
        return new Memento($this->state);
    }

    /**
     * @param Memento $memento
     * @return void
     */
    public function restoreStateFromMemento(Memento $memento)
    {
        $this->state = $memento->getState();
    }
}

// Клас, що представляє збережений стан
class Memento
{
    /**
     * @var
     */
    private $state;

    /**
     * @param $state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }
}

// Опікун, який зберігає та відновлює стан об'єкта Originator
class Caretaker
{
    /**
     * @var array
     */
    private $mementos = [];

    /**
     * @param Memento $memento
     * @return void
     */
    public function addMemento(Memento $memento)
    {
        $this->mementos[] = $memento;
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getMemento($index)
    {
        return $this->mementos[$index];
    }
}

// Приклад використання

// Створюємо об'єкт Originator
$originator = new Originator();

// Встановлюємо початковий стан
$originator->setState("Стан 1");
echo "Поточний стан: " . $originator->getState() . "\n";

// Створюємо опікуна
$caretaker = new Caretaker();

// Зберігаємо стан до моменту
$caretaker->addMemento($originator->saveStateToMemento());

// Змінюємо стан
$originator->setState("Стан 2");
echo "Поточний стан: " . $originator->getState() . "\n";

// Зберігаємо стан до моменту
$caretaker->addMemento($originator->saveStateToMemento());

// Змінюємо стан
$originator->setState("Стан 3");
echo "Поточний стан: " . $originator->getState() . "\n";

// Відновлюємо попередній стан
$originator->restoreStateFromMemento($caretaker->getMemento(0));
echo "Відновлений стан: " . $originator->getState() . "\n";
