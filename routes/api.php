<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\CharacterListsController;

Route::prefix('v1')->group(function () {
    //Character routes
    Route::get('/characters', [CharactersController::class, 'getCharacters']);
    //CharacterList routes
    Route::get('/character-lists', [CharacterListsController::class, 'getCharacterLists']);
    Route::get('/character-lists/{id}', [CharacterListsController::class, 'getCharacterList']);
    Route::post('/character-lists', [CharacterListsController::class, 'createCharacterList']);
    Route::put('/character-lists/{id}', [CharacterListsController::class, 'updateCharacterList']);
    Route::delete('/character-lists/{id}', [CharacterListsController::class, 'deleteCharacterList']);
});
