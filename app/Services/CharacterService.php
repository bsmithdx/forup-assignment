<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\CharacterDTOCollection;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class CharacterService
{
    public function __construct(
        private readonly ApiOfIceAndFireService $api,
    )
    {}

    public function getCharactersFromApi($name = ''): CharacterDTOCollection
    {
        try {
            return CharacterDTOCollection::fromJson($this->api->getCharacters($name));
        } catch (GuzzleException $exception) {
            Log::warning('getCharacters error: ' . $exception->getMessage(), ['exception' => $exception]);
            return new CharacterDTOCollection();
        }
    }
}
