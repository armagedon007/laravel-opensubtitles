<?php

namespace CodeBugLab\OpenSubtitles\HttpRequest;

use GuzzleHttp\Client;
use GuzzleHttp\Utils;

/**
 * HttpRequest class
 */
class HttpRequest implements HttpRequestInterface
{
    private Client $client;

    /**
     * @param  \GuzzleHttp\Client $client
     */
    public function __construct()
    {
        $this->client = app()->make(Client::class);
    }

    /**
     * @param  string      $url
     * @param  array       $fields
     * @param  array       $header
     *
     * @return string|null
     */
    public function post(string $url, array $fields, array $header): ?string
    {
        $response = $this->client->post($url, [
            'headers' => array_merge($header, [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]),
            'stream' => true,
            'http_errors' => false,
            'json' => $fields,
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * @param  string      $url
     * @param  array       $header
     *
     * @return string|null
     */
    public function get(string $url, array $header): ?string
    {
        $response = $this->client->get($url, [
            'headers' => $header,
        ]);

        return $response->getBody()->getContents();
    }
}
