<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiOfIceAndFireService
{
    public function __construct(
      private readonly Client $client,
    )
    {}

    /**
     * @throws GuzzleException
     */
    public function getCharacters(string $name = '', $pageSize = 50): string
    {
        $options = [
            'query' => [
                'pageSize' => $pageSize,
            ]
        ];
        if ($name) {
            $options['query']['name'] = $name;
        }
        return $this->client->request('GET', 'characters/', $options)->getBody()->getContents();
    }
}
