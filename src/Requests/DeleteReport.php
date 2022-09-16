<?php

namespace Michaelgatuma\PlagiarismSearch\Requests;

use Michaelgatuma\PlagiarismSearch\PlagiarismSearchService;

class DeleteReport extends PlagiarismSearchService
{
    private int $id;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->id=$id;
    }

    public function commit()
    {
        $url = $this->baseUrl . '/reports/delete/' . $this->id;
        return $this->post($url);
    }
}
