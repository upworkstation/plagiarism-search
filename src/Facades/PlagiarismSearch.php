<?php

namespace Michaelgatuma\PlagiarismSearch\Facades;

use Illuminate\Support\Facades\Facade;

class PlagiarismSearch extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'plagiarism-search';
    }
}
