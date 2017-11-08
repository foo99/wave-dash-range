# WaveDashRange

## Install

```sh
$ composer require foo99/wave-dash-range
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use Foo99\WaveDashRange\WaveDashRange as WaveDash;


$text = "100人〜110人";
$pattern = "/(?<start>\d+)人〜(?<end>\d+)人/u";
$skip = array(100, 101, 102, 103, 104, 105);

$result = WaveDash::range($text, $pattern, 1, $skip); // array(106, 107, 108, 109, 110)
```

## Test

```sh
$ vendor/bin/phpunit tests
```
