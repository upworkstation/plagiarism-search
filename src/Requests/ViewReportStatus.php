<?php

namespace Michaelgatuma\PlagiarismSearch\Requests;

use Michaelgatuma\PlagiarismSearch\PlagiarismSearchService;
use Throwable;
/**
 * Check report status, progress and report date-times (created, modified, notified)
 */
class ViewReportStatus extends PlagiarismSearchService
{
    private int $id;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->id=$id;
    }

    /**
     * @throws Throwable
     */
    public function fetch(): bool|string
    {
        throw_if(is_null($this->id), "ReportIdCannotBeNull Exception");
        $url = $this->baseUrl . '/reports/status/' . $this->id;
        return $this->post($url);
    }
}
