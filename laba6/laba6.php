<?php

/**
 * Інтерфейс виразу
 */
interface Expression
{
    /**
     * @param array $context
     * @return int
     */
    public function interpret(array $context): int;
}

/**
 * Конкретний вираз - число
 */
class Number implements Expression
{
    /**
     * @var int
     */
    private $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @param array $context
     * @return int
     */
    public function interpret(array $context): int
    {
        return $this->value;
    }
}

/**
 * Конкретний вираз - додавання
 */
class Addition implements Expression
{
    /**
     * @var Expression
     */
    private $leftOperand;
    /**
     * @var Expression
     */
    private $rightOperand;

    /**
     * @param Expression $leftOperand
     * @param Expression $rightOperand
     */
    public function __construct(Expression $leftOperand, Expression $rightOperand)
    {
        $this->leftOperand = $leftOperand;
        $this->rightOperand = $rightOperand;
    }

    /**
     * @param array $context
     * @return int
     */
    public function interpret(array $context): int
    {
        return $this->leftOperand->interpret($context) + $this->rightOperand->interpret($context);
    }
}

/**
 * Конкретний вираз - віднімання
 */
class Subtraction implements Expression
{
    /**
     * @var Expression
     */
    private $leftOperand;
    /**
     * @var Expression
     */
    private $rightOperand;

    /**
     * @param Expression $leftOperand
     * @param Expression $rightOperand
     */
    public function __construct(Expression $leftOperand, Expression $rightOperand)
    {
        $this->leftOperand = $leftOperand;
        $this->rightOperand = $rightOperand;
    }

    /**
     * @param array $context
     * @return int
     */
    public function interpret(array $context): int
    {
        return $this->leftOperand->interpret($context) - $this->rightOperand->interpret($context);
    }
}

// Приклад використання

// Створення виразу 5 + (2 - 1)
$expression = new Addition(
    new Number(5),
    new Subtraction(
        new Number(2),
        new Number(1)
    )
);

// Контекст не потрібний для цього прикладу, але може використовуватися для передачі додаткових даних при інтерпретації

// Інтерпретація виразу
$result = $expression->interpret([]);

echo $result; // Результат: 6

