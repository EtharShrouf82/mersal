<?php

function make_slug($string, $separator = '-')
{
    $string = trim($string);
    $string = mb_strtolower($string, 'UTF-8');
    $string = str_replace('/', '', $string);
    $string = str_replace('.', '', $string);
    $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", '', $string);
    $string = preg_replace("/[\s-]+/", ' ', $string);
    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}

function removeLastPart($uri)
{
    $url = explode('/', $uri);
    array_pop($url);

    return implode('/', $url);
}
