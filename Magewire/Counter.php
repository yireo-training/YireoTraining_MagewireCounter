<?php declare(strict_types=1);

namespace YireoTraining\MagewireCounter\Magewire;

use Magento\Customer\Model\Session;
use Magewirephp\Magewire\Component;

class Counter extends Component
{
    public function __construct(
        private Session $session
    ) {
    }

    public int $counter = 0;

    public function mount(): void
    {
        $this->counter = (int)$this->session->getData('counter');
    }

    public function increment()
    {
        $this->counter++;
        $this->session->setData('counter', $this->counter);
        $this->dispatchSuccessMessage(__('Counter is now '.$this->counter));
    }

    public function decrement()
    {
        $this->counter--;
        $this->session->setData('counter', $this->counter);
    }
}
