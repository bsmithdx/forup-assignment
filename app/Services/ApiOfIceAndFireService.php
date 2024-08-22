<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class ApiOfIceAndFireService
{
    public function __construct(
      private readonly Client $client,
    )
    {}

    public function getCharacters(string $name = '', $pageSize = 50)
    {
        $uri = "characters/?pageSize={$pageSize}" . ($name ? "&name={$name}" : '');

        try {
            return json_decode($this->client->request('GET', $uri)->getBody()->getContents(), true);
        } catch (GuzzleException $exception) {
            Log::warning('getCharacters error: ' . $exception->getMessage(), ['exception' => $exception]);
            return [];
        }
    }
}
