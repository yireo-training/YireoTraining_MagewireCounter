<?php declare(strict_types=1);

namespace YireoTraining\MagewireCounter\Magewire;

use Magewirephp\Magewire\Component;

class Counter extends Component
{
    public int $counter = 0;

    public function increment()
    {
        $this->counter++;
    }

    public function decrement()
    {
        $this->counter--;
    }
}
