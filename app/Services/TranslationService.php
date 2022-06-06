<?php

namespace App\Services;

use Statickidz\GoogleTranslate;

class TranslationService
{
    private const MAX_PART_LENGTH = 4999;
    private GoogleTranslate $googleTranslate;

    public function __construct(GoogleTranslate $googleTranslate)
    {
        $this->googleTranslate = $googleTranslate;
    }

    public function translate(string $textToTranslate, string $fromLang, string $toLang): string
    {
        $splitText = str_split($textToTranslate, self::MAX_PART_LENGTH);
        $result = '';

        foreach ($splitText as $text) {
            $result .= $this->googleTranslate->translate($fromLang, $toLang, $text);
        }

        return $result;
    }
}
