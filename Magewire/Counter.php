<?php declare(strict_types=1);

namespace YireoTraining\MagewireCounter\Magewire;

use Magento\Customer\Model\Session as CustomerSession;
use Magewirephp\Magewire\Component;

class Counter extends Component
{
    public function __construct(
        private CustomerSession $customerSession
    ) {
    }

    public $counter = 0;

    public function boot(): void
    {
        $this->counter = (int)$this->customerSession->getData('counter');
    }

    public function updatedCounter(string $value)
    {
        $this->customerSession->setCounter((int) $value);
        return $value;
    }

    public function increment()
    {
        $this->counter++;
        $this->customerSession->setCounter($this->counter);
        $this->dispatchSuccessMessage(__('Counter is now '.$this->counter));
    }

    public function decrement()
    {
        $this->counter--;
        $this->customerSession->setCounter($this->counter);
    }
}
