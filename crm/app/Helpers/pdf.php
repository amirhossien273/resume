<?php

use ArPHP\I18N\Arabic;

if (! function_exists('fa_pdf')) {
    function fa_pdf($text): string
    {
        if ($text === null) return '';
        static $arabic = null;
        if ($arabic === null) $arabic = new Arabic('Glyphs');
        return $arabic->utf8Glyphs((string) $text);
    }
}
