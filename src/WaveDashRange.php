<?php

namespace Foo99\WaveDashRange;

class WaveDashRange
{
    public static function range($text, $pattern, $step = 1, $skip = array())
    {
        preg_match($pattern, $text, $matches);
        $start = isset($matches["start"]) ? $matches["start"] : 1;
        $end = isset($matches["end"]) ? $matches["end"] : null;
        
        return isset($end) ? array_values(array_diff(range($start, $end, $step), $skip)) : array();
    }
}
