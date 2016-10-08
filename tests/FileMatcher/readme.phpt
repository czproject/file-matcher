<?php

use CzProject\FileMatcher\FileMatcher;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {

	$matcher = new FileMatcher;

	$masks = array(
		'temp/*',
		'.git*',
		'!.gitignore',
	);

	Assert::true($matcher->matchMask('.git', $masks, TRUE)); // returns TRUE
	Assert::false($matcher->matchMask('.gitignore', $masks)); // return FALSE
	Assert::true($matcher->matchMask('temp/cache', $masks, TRUE)); // returns TRUE
	Assert::false($matcher->matchMask('log/2016', $masks, TRUE)); // returns FALSE

});
