<?php

namespace MrTea\Concierge\Facades;

use Illuminate\Support\Facades\Facade;

class Concierge extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'concierge';
    }
}