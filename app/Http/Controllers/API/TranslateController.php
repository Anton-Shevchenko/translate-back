<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TranslateRequest;
use App\Services\TranslationService;
use Illuminate\Http\JsonResponse;

class TranslateController extends Controller
{
    private TranslationService $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    public function store(TranslateRequest $request): JsonResponse
    {
        return response()->json([
            'result' => $this->translationService->translate(
                $request->input('text'), $request->input('from-lang'), $request->input('to-lang')),
        ]);
    }
}
