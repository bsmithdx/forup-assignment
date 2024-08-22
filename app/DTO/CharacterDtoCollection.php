<?php

declare(strict_types=1);

namespace App\DTO;

class CharacterDtoCollection
{
    public function __construct(
        /** array<CharacterDTO> $characters */
        private array $characters = [],
    )
    {}

    public static function fromJson(string $json): CharacterDTOCollection
    {
        $data = json_decode($json, true);
        $collection = new self();
        foreach ($data as $character) {
            $collection->addCharacter(CharacterDto::fromArray($character));
        }
        return $collection;
    }

    public function addCharacter(CharacterDto $character): void
    {
        $this->characters[$character->getUrl()] = $character;
    }

    public function getCharacterByUrl(string $url): ?CharacterDto
    {
        return $this->characters[$url] ?? null;
    }

    /**
     * @return array<CharacterDto>
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function toArray(): array
    {
        return array_map(function(CharacterDto $character) {
            return $character->toArray();
        }, array_values($this->characters));
    }
}
