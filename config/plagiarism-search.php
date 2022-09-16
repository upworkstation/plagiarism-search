<?php
/** @noinspection LaravelFunctionsInspection */

return [
    /*
     * The API url endpoint (default:https://plagiarismsearch.com/api/v3)
     */
    'base_url' => 'https://plagiarismsearch.com/api/v3',

    /*
     * API user email i.e michaelgatuma@example.com
     */
    'api_user' => env('PLAGIARISMSEARCH_USER', ''),

    /*
     * API key i.e 3ntdg31tj1lkg51en4cjkg-142583655
     */
    'api_key' => env('PLAGIARISMSEARCH_KEY', '')
];
