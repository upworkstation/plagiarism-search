<?php

namespace Michaelgatuma\PlagiarismSearch;

use Michaelgatuma\PlagiarismSearch\Requests\CreateReport;
use Michaelgatuma\PlagiarismSearch\Requests\DeleteReport;
use Michaelgatuma\PlagiarismSearch\Requests\ListReports;
use Michaelgatuma\PlagiarismSearch\Requests\UpdateReport;
use Michaelgatuma\PlagiarismSearch\Requests\ViewReport;
use Michaelgatuma\PlagiarismSearch\Requests\ViewReportStatus;
use Michaelgatuma\PlagiarismSearch\Traits\HasReports;

class PlagiarismSearch
{
    /**
     * Add new report (Submit the document to check)
     * @return CreateReport
     */
    public static function createReport(): CreateReport
    {
        return new CreateReport();
    }

    /**
     * Delete report {id}
     * @param $id
     * @return DeleteReport
     */
    public static function deleteReport($id): DeleteReport
    {
        return new DeleteReport($id);
    }

    /**
     * List of reports
     * @return ListReports
     */
    public static function listReports(): ListReports
    {
        return new ListReports();
    }

    /**
     * Update report {id}
     * @param $id
     * @return UpdateReport
     */
    public static function updateReport($id): UpdateReport
    {
        return new UpdateReport($id);
    }

    /**
     * View report {id}
     * @param $id
     * @return ViewReport
     */
    public static function viewReport($id): ViewReport
    {
        return new ViewReport($id);
    }

    /**
     * Check status of report {id}
     * @param $id
     * @return ViewReportStatus
     */
    public static function getReportStatus($id): ViewReportStatus
    {
        return new ViewReportStatus($id);
    }

}
