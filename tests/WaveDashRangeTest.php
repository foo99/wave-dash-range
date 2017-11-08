<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Foo99\WaveDashRange\WaveDashRange;

class WaveDashRangeTest extends TestCase
{
    public function testRange()
    {
        $text = "100人〜110人";
        $pattern = "/(?<start>\d+)人〜(?<end>\d+)人/u";
        $actual = WaveDashRange::range($text, $pattern);
        
        $expected = array(100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110);
        $this->assertEquals($expected, $actual);
    }
    
    public function testToRange2()
    {
        $text = "100〜110人";
        $pattern = "/(?<start>\d+)〜(?<end>\d+)人/u";
        $actual = WaveDashRange::range($text, $pattern);
        
        $expected = array(100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110);
        $this->assertEquals($expected, $actual);
    }
    
    public function testToRange3()
    {
        $text = "100〜110人";
        $pattern = "/(?<start>\d+)〜(?<end>\d+)人/u";
        $actual = WaveDashRange::range($text, $pattern, 2);
        
        $expected = array(100, 102, 104, 106, 108, 110);
        $this->assertEquals($expected, $actual);
    }
    
    public function testToRange4()
    {
        $text = "100〜110人";
        $pattern = "/(?<start>\d+)〜(?<end>\d+)人/u";
        $skip = array(100, 101, 102, 103, 104, 105);
        $actual = WaveDashRange::range($text, $pattern, 1, $skip);
        
        $expected = array(106, 107, 108, 109, 110);
        $this->assertEquals($expected, $actual);
    }
    
    public function testToRange5()
    {
        $text = "〜10人";
        $pattern = "/〜(?<end>\d+)人/u";
        $actual = WaveDashRange::range($text, $pattern);
        
        $expected = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $this->assertEquals($expected, $actual);
    }
    
    public function testToRange6()
    {
        $text = "aaaa";
        $pattern = "/(?<start>\d+)人〜(?<end>\d+)人/u";
        $actual = WaveDashRange::range($text, $pattern);
        
        $expected = array();
        $this->assertEquals($expected, $actual);
    }
}
