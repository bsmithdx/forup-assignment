<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ApiOfIceAndFireService;
use App\Services\CharacterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function getCharacters(Request $request, CharacterService $service): JsonResponse
    {
        $nameFilter = $request->input('name') ?: '';

        $characters = $service->getCharactersFromApi($nameFilter);
        return response()->json($characters->toArray());
    }
}
