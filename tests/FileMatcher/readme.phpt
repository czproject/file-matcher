<?php

use CzProject\FileMatcher\FileMatcher;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {

	$masks = array(
		'temp/*',
		'.git*',
		'!.gitignore',
	);

	Assert::true(FileMatcher::matchMask('.git', $masks, TRUE)); // returns TRUE
	Assert::false(FileMatcher::matchMask('.gitignore', $masks)); // return FALSE
	Assert::true(FileMatcher::matchMask('temp/cache', $masks, TRUE)); // returns TRUE
	Assert::false(FileMatcher::matchMask('log/2016', $masks, TRUE)); // returns FALSE

});
