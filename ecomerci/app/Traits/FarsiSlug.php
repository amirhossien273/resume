<?php

namespace App\Traits;

trait FarsiSlug
{
    public function createFarsiSlug($string)
    {
        // Replace spaces with dashes
        $string = str_replace(' ', '-', $string);
        
        // Remove any special characters except Farsi letters, numbers, and dashes
        $string = preg_replace('/[^آ-ی0-9\-]/u', '', $string);
        
        // Remove multiple dashes
        $string = preg_replace('/-+/', '-', $string);
        
        // Remove dashes from start and end
        $string = trim($string, '-');
        
        return $string;
    }
} 