<?php

namespace CodeBugLab\OpenSubtitles\Url;

use CodeBugLab\OpenSubtitles\HttpRequest\HttpRequestInterface;

class ApiGenerator implements ApiGeneratorInterface
{
    public $url;

    protected $apiUrl;

    protected $apiKey;

    protected $userAgent;

    protected $httpRequest;

    public function __construct(string $apiUrl, string $apiKey, string $userAgent, HttpRequestInterface $httpRequest)
    {
        $this->apiUrl = $apiUrl;

        $this->apiKey = $apiKey;

        $this->userAgent = $userAgent;

        $this->httpRequest = $httpRequest;
    }

    public function post(string $path, array $fields)
    {
        return $this->httpRequest->post($this->apiUrl . $path, $fields, $this->getHeaders());
    }

    public function get(string $path, array $parametrs)
    {
        return $this->httpRequest->get($this->apiUrl . $path, $parametrs, $this->getHeaders());
    }


    protected function getHeaders(): array
    {
        return [
            'Content-type' => 'application/json',
            'Api-Key' => $this->apiKey,
            'User-Agent' => $this->userAgent
        ];
    }
}
