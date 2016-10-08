
# FileMatcher

## Usage


``` php
<?php

use CzProject\FileMatcher\FileMatcher;

$matcher = new FileMatcher;

$matcher->matchMask($path, $masks[, $isPathDirectory]);

$masks = array(
	'temp/*',
	'.git*',
	'!.gitignore',
);

$matcher->matchMask('.git', $masks, TRUE); // returns TRUE
$matcher->matchMask('.gitignore', $masks); // return FALSE
$matcher->matchMask('temp/cache', $masks, TRUE); // returns TRUE
$matcher->matchMask('log/2016', $masks, TRUE); // returns FALSE

```


Installation
------------

[Download a latest package](https://github.com/czproject/file-matcher/releases) or use [Composer](http://getcomposer.org/):

```
composer require [--dev] czproject/file-matcher
```

`CzProject\FileMatcher` requires PHP 5.4.0 or later.


------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, https://www.janpecha.cz/
