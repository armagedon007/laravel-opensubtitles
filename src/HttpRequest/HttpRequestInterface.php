<?php

namespace CodeBugLab\OpenSubtitles\HttpRequest;

interface HttpRequestInterface
{
    /**
     * @param  string $url
     * @param  array  $fields
     * @param  array  $header
     *
     * @return null|string
     */
    public function post(string $url, array $fields, array $header): ?string;

    /**
     * @param  string      $url
     * @param  array       $parametrs
     * @param  array       $header
     *
     * @return string|null
     */
    public function get(string $url, array $parametrs, array $header): ?string;
}
