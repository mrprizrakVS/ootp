<?php
// Інтерфейс стратегії

interface PaymentStrategy
{
    /**
     * @param $amount
     * @return mixed
     */
    public function pay($amount);
}

// Конкретні стратегії

class CreditCardPaymentStrategy implements PaymentStrategy
{
    /**
     * @var
     */
    private $creditCardNumber;
    /**
     * @var
     */
    private $expirationDate;
    /**
     * @var
     */
    private $cvv;

    /**
     * @param $creditCardNumber
     * @param $expirationDate
     * @param $cvv
     */
    public function __construct($creditCardNumber, $expirationDate, $cvv)
    {
        $this->creditCardNumber = $creditCardNumber;
        $this->expirationDate = $expirationDate;
        $this->cvv = $cvv;
    }

    /**
     * @param $amount
     * @return mixed|void
     */
    public function pay($amount)
    {
        // Логіка оплати кредитною карткою
        echo "Оплата $amount використовуючи карту.";
    }
}

class PayPalPaymentStrategy implements PaymentStrategy
{
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $password;

    /**
     * @param $email
     * @param $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @param $amount
     * @return mixed|void
     */
    public function pay($amount)
    {
        // Логіка оплати через PayPal
        echo "Оплата $amount використовуючи PayPal.";
    }
}

// Клас контексту
class ShoppingCart
{
    /**
     * @var
     */
    private $paymentStrategy;

    /**
     * @param PaymentStrategy $paymentStrategy
     * @return void
     */
    public function setPaymentStrategy(PaymentStrategy $paymentStrategy)
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    /**
     * @param $amount
     * @return void
     */
    public function checkout($amount)
    {
        $this->paymentStrategy->pay($amount);
    }
}

// Приклад використання

// Створення об'єкту стратегії
$creditCardStrategy = new CreditCardPaymentStrategy('1234567890', '12/24', '123');
$payPalStrategy = new PayPalPaymentStrategy('example@example.com', 'password123');

// Створення об'єкту контексту
$cart = new ShoppingCart();

// Встановлення стратегії оплати
$cart->setPaymentStrategy($creditCardStrategy);

// Оплата
$cart->checkout(100);

// Зміна стратегії оплати
$cart->setPaymentStrategy($payPalStrategy);

// Оплата
$cart->checkout(50);
