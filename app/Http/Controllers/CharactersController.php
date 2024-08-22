<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ApiOfIceAndFireService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function getCharacters(Request $request, ApiOfIceAndFireService $api): JsonResponse
    {
        $nameFilter = $request->input('name') ?: '';

        $characters = $api->getCharacters($nameFilter);
        return response()->json($characters);
    }
}
