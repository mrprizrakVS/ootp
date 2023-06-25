<?php
// Інтерфейс команди
interface CommandInterface {
    /**
     * @return mixed
     */
    public function execute();
}

// Конкретна команда 1
class ConcreteCommand1 implements CommandInterface {
    /**
     * @var Receiver
     */
    private $receiver;

    /**
     * @param Receiver $receiver
     */
    public function __construct(Receiver $receiver) {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed|void
     */
    public function execute() {
        $this->receiver->action1();
    }
}

// Конкретна команда 2
class ConcreteCommand2 implements CommandInterface {
    /**
     * @var Receiver
     */
    private $receiver;

    /**
     * @param Receiver $receiver
     */
    public function __construct(Receiver $receiver) {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed|void
     */
    public function execute() {
        $this->receiver->action2();
    }
}

// Отримувач
class Receiver {
    /**
     * @return void
     */
    public function action1() {
        echo "Виконується дія 1\n";
    }

    /**
     * @return void
     */
    public function action2() {
        echo "Виконується дія 2\n";
    }
}

// Макрокоманда, яка складається з кількох команд
class MacroCommand implements CommandInterface {
    /**
     * @var array
     */
    private $commands;

    /**
     * @param array $commands
     */
    public function __construct(array $commands) {
        $this->commands = $commands;
    }

    /**
     * @return mixed|void
     */
    public function execute() {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }
}

// Клієнтський код
$receiver = new Receiver();

$command1 = new ConcreteCommand1($receiver);
$command2 = new ConcreteCommand2($receiver);

// Створення макрокоманди з двох команд
$macroCommand = new MacroCommand([$command1, $command2]);

// Виконання макрокоманди
$macroCommand->execute();
