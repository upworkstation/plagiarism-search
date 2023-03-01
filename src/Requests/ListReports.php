<?php

namespace Michaelgatuma\PlagiarismSearch\Requests;

use Michaelgatuma\PlagiarismSearch\PlagiarismSearchService;

class ListReports extends PlagiarismSearchService
{
    protected array $report_ids = [];
    protected int $remote_id = 0;
    protected int $pages = 1;
    protected int $limit = 10;
    protected int $show_relations = 0;

    private function relax(): void
    {/*do absolutely nothing*/
    }

    /**
     * Array of report ids
     * @param array $ids
     * @return $this
     */
    public function reports(array $report_ids): ListReports
    {
        $this->report_ids = $report_ids;
        return $this;
    }

    /**
     * Set Page number
     * @param int $pages
     * @return ListReports
     */
    public function pages(int $pages = 1): ListReports
    {
        $this->pages = $pages;
        return $this;
    }

    /**
     * Local document id
     * @param int $remote_id
     * @return ListReports
     */
    public function remoteId(int $remote_id): ListReports
    {
        $this->remote_id = $remote_id;
        return $this;
    }

    /**
     * @param int $limit
     * @return ListReports
     */
    public function limit(int $limit = 10): ListReports
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Return report relations. (Full report data). Acceptable values are:
     * 0: Returns basic information of report (default).
     * 1: Returns all report data as tree. Paragraphs, sentences and sources with highlight text (`data.paragraphs` response field).
     * -1: Returns all report raw data (`data.paragraphs`, `data.blocks`, `data.sources` response fields).
     * -2: Returns list of sources ordered by plagiarism percent (`data.sources` response field).
     * -3: Returns html report content (`data.html` response field).
     * @param int $show_relations
     * @return ListReports
     */
    public function relations(int $show_relations = 0): ListReports
    {
        $this->show_relations = $show_relations;
        return $this;
    }

    public function fetch()
    {
        $data = [];
        $this->report_ids ? array_push($data, ['ids' => $this->report_ids]) : $this->relax();
        $this->remote_id ? array_push($data, ['remote_id' => $this->remote_id]) : $this->relax();
        $data=array_merge($data, [
            'page' => $this->pages,
            'limit' => $this->limit,
            'show_relations' => $this->show_relations
        ]);
        $url = $this->baseUrl . '/reports';
        return $this->post($url, $data);
    }
}
