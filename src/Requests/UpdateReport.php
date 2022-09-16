<?php

namespace Michaelgatuma\PlagiarismSearch\Requests;

use Michaelgatuma\PlagiarismSearch\PlagiarismSearchService;
use Throwable;

class UpdateReport extends PlagiarismSearchService
{

    private int $id;
    private array $fields;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->id=$id;
    }

    /**
     * Associative array of update report fields
     * @param array $fields
     * @return UpdateReport
     */
    public function fields(array $fields): UpdateReport
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @throws Throwable
     */
    public function commit(): bool|string
    {
        throw_if(is_null($this->id), "ReportIdCannotBeNull Exception");
        throw_if(count($this->fields) == 0, "ReportFieldsCannotBeEmpty Exception");
        $data = [
            'report' => $this->fields,
        ];

        $url = $this->baseUrl . '/reports/update/' . $this->id;
        return $this->post($url, $data);
    }
}
