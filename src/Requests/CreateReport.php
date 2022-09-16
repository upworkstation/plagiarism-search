<?php

namespace Michaelgatuma\PlagiarismSearch\Requests;

use Michaelgatuma\PlagiarismSearch\PlagiarismSearchService;

class CreateReport extends PlagiarismSearchService
{
    private array $data = array(), $files = array();

    /**
     * @param string $text
     * @return CreateReport
     */
    public function text(string $text): CreateReport
    {
        $this->data = array_merge($this->data, ['text' => $text]);
        return $this;
    }

    /**
     * @param string $file
     * @return CreateReport
     */
    public function file(string $realpath): CreateReport
    {
        $this->data = array_merge($this->data, ['file' => $realpath]);
        return $this;
    }

    /**
     * @param string $url
     * @return CreateReport
     */
    public function url(string $url): CreateReport
    {
        $this->data = array_merge($this->data, ['url' => $url]);
        return $this;
    }

    /**
     * @param string $title
     * @return CreateReport
     */
    public function title(string $title): CreateReport
    {
        $this->data = array_merge($this->data, ['title' => $title]);
        return $this;
    }

    /**
     * @param int $remoteId
     * @return CreateReport
     */
    public function remoteId(int $remoteId): CreateReport
    {
        $this->data = array_merge($this->data, ['remote_id' => $remoteId]);
        return $this;
    }

    /**
     * @param int $filterChars
     * @return CreateReport
     */
    public function filterChars(int $filterChars): CreateReport
    {
        $this->data = array_merge($this->data, ['filter_chars' => $filterChars]);
        return $this;
    }

    /**
     * @param int $filterReferences
     * @return CreateReport
     */
    public function filterReferences(int $filterReferences): CreateReport
    {
        $this->data = array_merge($this->data, ['filter_references' => $filterReferences]);
        return $this;
    }

    /**
     * @param int $filterQuotes
     * @return CreateReport
     */
    public function filterQuotes(int $filterQuotes): CreateReport
    {
        $this->data = array_merge($this->data, ['filter_quotes' => $filterQuotes]);
        return $this;
    }

    /**
     * @param string $callbackUrl
     * @return CreateReport
     */
    public function callbackUrl(string $callbackUrl): CreateReport
    {
        $this->data = array_merge($this->data, ['callback_url' => $callbackUrl]);
        return $this;
    }

    /**
     * @param int $searchWeb
     * @return CreateReport
     */
    public function searchWeb(int $searchWeb): CreateReport
    {
        $this->data = array_merge($this->data, ['search_web' => $searchWeb]);
        return $this;
    }

    /**
     * @param string $searchStorage
     * @return CreateReport
     */
    public function searchStorage(string $searchStorage): CreateReport
    {
        $this->data = array_merge($this->data, ['search_storage' => $searchStorage]);
        return $this;
    }

    /**
     * @param array $searchStorageFilter
     * @return CreateReport
     */
    public function searchStorageFilter(array $searchStorageFilter): CreateReport
    {
        $this->data = array_merge($this->data, ['search_storage_filter' => $searchStorageFilter]);
        return $this;
    }

    /**
     * @param array $searchStorageUserGroup
     * @return CreateReport
     */
    public function searchStorageUserGroup(array $searchStorageUserGroup): CreateReport
    {
        $this->data = array_merge($this->data, ['search_storage_user_group' => $searchStorageUserGroup]);
        return $this;
    }

    /**
     * @param int $storage
     * @return CreateReport
     */
    public function storage(int $storage): CreateReport
    {
        $this->data = array_merge($this->data, ['storage' => $storage]);
        return $this;
    }

    /**
     * @param int $storageGroupId
     * @return CreateReport
     */
    public function storageGroupId(int $storageGroupId): CreateReport
    {
        $this->data = array_merge($this->data, ['storage_group_id' => $storageGroupId]);
        return $this;
    }

    /**
     * @param int $storageUserId
     * @return CreateReport
     */
    public function storageUserId(int $storageUserId): CreateReport
    {
        $this->data = array_merge($this->data, ['storage_user_id' => $storageUserId]);
        return $this;
    }

    /**
     * @param int $storageFileId
     * @return CreateReport
     */
    public function storageFileId(int $storageFileId): CreateReport
    {
        $this->data = array_merge($this->data, ['storage_file_id' => $storageFileId]);
        return $this;
    }

    /**
     * @param array $searchWebDisableUrls
     * @return CreateReport
     */
    public function searchWebDisableUrls(array $searchWebDisableUrls): CreateReport
    {
        $this->data = array_merge($this->data, ['search_web_disable_urls' => $searchWebDisableUrls]);
        return $this;
    }

    /**
     * @param array $searchWebExcludeUrls
     * @return CreateReport
     */
    public function searchWebExcludeUrls(array $searchWebExcludeUrls): CreateReport
    {
        $this->data = array_merge($this->data, ['search_web_exclude_urls' => $searchWebExcludeUrls]);
        return $this;
    }

    /**
     * @param array $searchWebExcludeUrls
     * @return CreateReport
     */
    public function files(array $files): CreateReport
    {
        $this->files = array_map(function ($file) {
            return ['file' => $file];
        }, $files);

        return $this;
    }

    public function create()
    {
        $url = $this->baseUrl . '/reports/create';
        return $this->post($url, $this->data, $this->files);
    }
}
