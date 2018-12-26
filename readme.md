
# FileMatcher

[![Build Status](https://travis-ci.org/czproject/file-matcher.svg?branch=master)](https://travis-ci.org/czproject/file-matcher)


## Installation

[Download a latest package](https://github.com/czproject/file-matcher/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/file-matcher
```

`CzProject\FileMatcher` requires PHP 5.4.0 or later.


## Usage

``` php
<?php

use CzProject\FileMatcher\FileMatcher;

FileMatcher::matchMask($path, $masks[, $isPathDirectory]);

$masks = array(
	'temp/*',
	'.git*',
	'!.gitignore',
);

FileMatcher::matchMask('.git', $masks, TRUE); // returns TRUE
FileMatcher::matchMask('.gitignore', $masks); // return FALSE
FileMatcher::matchMask('temp/cache', $masks, TRUE); // returns TRUE
FileMatcher::matchMask('log/2016', $masks, TRUE); // returns FALSE
```

------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, https://www.janpecha.cz/
