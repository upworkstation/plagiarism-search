<?php

namespace Michaelgatuma\PlagiarismSearch;

use CURLFile;
use http\Client\Response;
use Illuminate\Http\JsonResponse;

abstract class PlagiarismSearchService
{
    protected string $baseUrl = 'https://plagiarismsearch.com/api/v3';
    private $apiUser;
    private $apiKey;
    public const SHOW_BASIC_REPORT_INFO = 0;
    public const SHOW_ALL_REPORT_DATA = 1;
    public const SHOW_RAW_REPORT_DATA = -1;
    public const SHOW_REPORT_SOURCES_BY_PLAGIARISM_TEST = -2;
    public const SHOW_HTML_REPORT_CONTENT = -3;

    public function __construct()
    {
        $config = [
            'apiUrl' => 'https://plagiarismsearch.com/api/v3',
            'apiUser' => 'laptou@berserkertech.xyz',
            'apiKey' => '2ntdg21tj1tkg51en4cjkg-148383655',
        ];

        if (!empty($config)) {
            $this->configure($config);
        }
    }

    protected function configure($config = array()): void
    {
        if (!empty($config)) {
            if (is_array($config)) {
                foreach ($config as $key => $value) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    /**
     * @param $url
     * @param array $post
     * @param array $files
     */
    protected function post($url, array $post = array(), array $files = array())
    {
        $curl = curl_init($url);

        if ($postFields = $this->buildPostFiles($post, $files) or $postFields = $this->buildPostToString($post)) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
        }

        // HTTP basic authentication
        curl_setopt($curl, CURLOPT_USERPWD, $this->apiUser . ':' . $this->apiKey);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);

        $data = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            var_dump($error);
        }

//        return response($data, 200);
        return json_decode($data, true);
    }

    private function buildPostToString($post)
    {
        if (!empty($post)) {
            if (is_array($post)) {
                return http_build_query($post, '', '&');
            } else {
                return $post;
            }
        }
        return false;
    }

    private function buildPostFiles($post, $files): array
    {
        $result = array();
        if (!empty($post) and is_array($post)) {
            foreach ($post as $key => $value) {
                if (is_array($value)) {
                    $result[$key] = http_build_query($value, '', '&');
                } else {
                    $result[$key] = $value;
                }
            }
        }
        if (!empty($files) and is_array($files)) {
            $result = array_merge($result, $this->buildFiles($files));
        }

        return $result;
    }

    private function buildFiles($files): array
    {
        $result = array();
        if (!empty($files)) {
            foreach ($files as $key => $value) {
                if (is_string($value)) {
                    $result[$key] = new CURLFile(realpath($value));
                } elseif (isset($value['tmp_name'])) {
                    $file = $value['tmp_name'];
                    $name = $value['name'] ?? null;
                    $type = $value['type'] ?? null;

                    $result[$key] = new CURLFile($file, $type, $name);
                }
            }
        }
        return $result;
    }
}
