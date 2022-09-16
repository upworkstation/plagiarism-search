<?php

namespace Michaelgatuma\PlagiarismSearch\Requests;

use Michaelgatuma\PlagiarismSearch\PlagiarismSearchService;
use Throwable;

/**
 * View Report
 */
class ViewReport extends PlagiarismSearchService
{
    private string $intent = "view";
    private int $id;
    private int $showRelations;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->id=$id;
    }

    /**
     * @param int $showRelations
     * @return ViewReport
     */
    public function relations(int $showRelations): static
    {
        $this->showRelations = $showRelations;
        return $this;
    }

    /**
     * @throws Throwable
     */
    public function fetch()
    {
        throw_if(is_null($this->id), "ReportIdCannotBeNull Exception");

        $url = $this->baseUrl . '/reports/view/' . $this->id;
        $data = [
            'show_relations' => $this->showRelations ?? self::SHOW_ALL_REPORT_DATA,
        ];
        return $this->post($url, $data);
    }

}
