<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Services\ApiOfIceAndFireService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiOfIceAndFireServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetCharacterFromApiByName(): void
    {
        $expected = [
                [
                "url" => "https://anapioficeandfire.com/api/characters/583",
                "name" => "Jon Snow",
                "gender" => "Male",
                "culture" => "Northmen",
                "born" => "In 283 AC",
                "died" => "",
                "titles" => [
                    "Lord Commander of the Night's Watch"
                ],
                "aliases" => [
                    "Lord Snow",
                    "Ned Stark's Bastard",
                    "The Snow of Winterfell",
                    "The Crow-Come-Over",
                    "The 998th Lord Commander of the Night's Watch",
                    "The Bastard of Winterfell",
                    "The Black Bastard of the Wall",
                    "Lord Crow"
                ],
                "father" => "",
                "mother" => "",
                "spouse" => "",
                "allegiances" => [
                    "https://anapioficeandfire.com/api/houses/362"
                ],
                "books" => [
                    "https://anapioficeandfire.com/api/books/5"
                ],
                "povBooks" => [
                    "https://anapioficeandfire.com/api/books/1",
                    "https://anapioficeandfire.com/api/books/2",
                    "https://anapioficeandfire.com/api/books/3",
                    "https://anapioficeandfire.com/api/books/8"
                ],
                "tvSeries" => [
                    "Season 1",
                    "Season 2",
                    "Season 3",
                    "Season 4",
                    "Season 5",
                    "Season 6"
                ],
                "playedBy" => [
                    "Kit Harington"
                ]
            ]
        ];
        /** @var ApiOfIceAndFireService $service */
        $service = app(ApiOfIceAndFireService::class);
        $characters = $service->getCharacters('Jon Snow');
        $this->assertEqualsCanonicalizing($expected, json_decode($characters, true));
    }
}
