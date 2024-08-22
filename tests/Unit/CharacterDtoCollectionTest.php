<?php

namespace Tests\Unit;

use App\DTO\CharacterDTOCollection;
use PHPUnit\Framework\TestCase;

class CharacterDtoCollectionTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testCreateDtoFromJson(): void
    {
        $jsonData = '[
      {
        "url": "https://www.anapioficeandfire.com/api/characters/1",
        "name": "",
        "gender": "Female",
        "culture": "Braavosi",
        "born": "",
        "died": "",
        "titles": [],
        "aliases": [
            "The Daughter of the Dusk"
        ],
        "father": "",
        "mother": "",
        "spouse": "",
        "allegiances": [],
        "books": [
            "https://www.anapioficeandfire.com/api/books/5"
        ],
        "povBooks": [],
        "tvSeries": [],
        "playedBy": []
      },
        {
        "url": "https://www.anapioficeandfire.com/api/characters/2",
        "name": "Walder",
        "gender": "Male",
        "culture": "",
        "born": "",
        "died": "",
        "titles": [],
        "aliases": ["Hodor"],
        "father": "",
        "mother": "",
        "spouse": "",
        "allegiances": ["https://www.anapioficeandfire.com/api/houses/362"],
        "books": ["https://www.anapioficeandfire.com/api/books/1",
        "https://www.anapioficeandfire.com/api/books/2",
        "https://www.anapioficeandfire.com/api/books/3",
        "https://www.anapioficeandfire.com/api/books/5",
        "https://www.anapioficeandfire.com/api/books/8"],
        "povBooks": [],
        "tvSeries": ["Season 1",
        "Season 2",
        "Season 3",
        "Season 4",
        "Season 6"],
        "playedBy": ["Kristian Nairn"]
        }
    ]';

        $collection = CharacterDTOCollection::fromJson($jsonData);
        $character1 = $collection->getCharacterByUrl('https://www.anapioficeandfire.com/api/characters/2');
        $this->assertSame('Walder', $character1->getName());
        $this->assertSame('Male', $character1->getGender());
        $this->assertSame('', $character1->getCulture());
        $this->assertSame('Hodor', $character1->getAlias());


        $expectedOutput = [
            [
                'url' => 'https://www.anapioficeandfire.com/api/characters/1',
                'name' => '',
                'gender' => 'Female',
                'culture' => 'Braavosi',
                'alias' => 'The Daughter of the Dusk',
                'createdAt' => null,
            ],
            [
                'url' => 'https://www.anapioficeandfire.com/api/characters/2',
                'name' => 'Walder',
                'gender' => 'Male',
                'culture' => '',
                'alias' => 'Hodor',
                'createdAt' => null,
            ],
        ];

        $output = $collection->toArray();
        $this->assertEqualsCanonicalizing($expectedOutput, $output);

    }
}
