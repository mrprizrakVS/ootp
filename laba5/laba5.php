<?php

// Інтерфейс ітератора
interface IteratorInterface {
    /**
     * @return bool
     */
    public function hasNext(): bool;

    /**
     * @return mixed
     */
    public function next();
}

// Клас колекції
class Collection implements IteratorAggregate {
    /**
     * @var array
     */
    private $items = [];

    /**
     * @param $item
     * @return void
     */
    public function addItem($item) {
        $this->items[] = $item;
    }

    /**
     * @return IteratorInterface
     */
    public function getIterator(): IteratorInterface {
        return new CollectionIterator($this->items);
    }
}

// Клас ітератора колекції
class CollectionIterator implements IteratorInterface {
    /**
     * @var
     */
    private $items;
    /**
     * @var int
     */
    private $position = 0;

    /**
     * @param $items
     */
    public function __construct($items) {
        $this->items = $items;
    }

    /**
     * @return bool
     */
    public function hasNext(): bool {
        return $this->position < count($this->items);
    }

    /**
     * @return mixed
     */
    public function next() {
        $item = $this->items[$this->position];
        $this->position++;
        return $item;
    }
}

// Використання патерну Ітератор
$collection = new Collection();
$collection->addItem("Item 1");
$collection->addItem("Item 2");
$collection->addItem("Item 3");

$iterator = $collection->getIterator();
while ($iterator->hasNext()) {
    $item = $iterator->next();
    echo $item . "\n";
}

