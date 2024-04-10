<?php

if (!function_exists('trans_array')) {
    /**
     * Получить перевод из массива переводов.
     *
     * @param string $key Ключ перевода
     * @param string $locale Язык перевода
     * @return string Перевод
     */
    function trans_array($key, $locale = 'ru') {
        $translations = require resource_path('lang/translations.php');
        
        return $translations[$key][$locale] ?? 'Translation not found';
    }
}
