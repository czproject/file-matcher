<?php

use CzProject\FileMatcher\FileMatcher;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {

	$matcher = new FileMatcher;
	Assert::false($matcher->matchMask('bootstrap.php', array()));

});


test(function () {

	$matcher = new FileMatcher;
	$masks = array(
		'*',
	);
	Assert::true($matcher->matchMask('bootstrap.php', $masks));

});


test(function () {

	$matcher = new FileMatcher;
	$masks = array(
		'*.php',
		'!bootstrap.php',
	);
	Assert::false($matcher->matchMask('bootstrap.php', $masks));

});


test(function () {

	$matcher = new FileMatcher;
	$masks = array(
		'temp/*/'
	);
	Assert::false($matcher->matchMask('temp/file.php', $masks));

});


test(function () {

	$matcher = new FileMatcher;
	$masks = array(
		'temp/*'
	);
	Assert::true($matcher->matchMask('temp/cache/', $masks, TRUE)); // directory

});
