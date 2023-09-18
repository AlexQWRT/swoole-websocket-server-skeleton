<?php

namespace App\Services\Events\Subjects;

use SplObserver;
use SplSubject;

class NewMessageSubject implements SplSubject
{
    public function attach(SplObserver $observer): void
    {
        // TODO: Implement attach() method.
    }

    public function detach(SplObserver $observer): void
    {
        // TODO: Implement detach() method.
    }

    public function notify(): void
    {

    }
}