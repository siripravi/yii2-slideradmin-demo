<?php

namespace app\admin\components;

class Filter
{
    public static function text($string)
    {
        $string = preg_replace('/<.+?>/iu', '', $string);

        $string = trim(preg_replace('/[^\'a-zа-яґєіїё\- 0-9\.,\/"№&\(\)\n\!\?%\:;\+\#\=\*\$\']/iu', '', $string));

        return empty($string) ? null : $string;
    }

    public static function ucfirst($str, $lowerEnd = false, $encoding = 'UTF-8')
    {
        $firstLetter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
        if ($lowerEnd) {
            $strEnd = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
        } else {
            $strEnd = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
        }
        return $firstLetter . $strEnd;
    }
}