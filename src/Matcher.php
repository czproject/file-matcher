<?php

	namespace CzProject\FileMatcher;


	class FileMatcher
	{
		/**
		 * Matches filename against patterns.
		 * @param  string   relative path
		 * @param  string[] patterns
		 * @return bool
		 */
		public function matchMask($path, array $patterns, $isDir = FALSE)
		{
			$res = FALSE;
			$path = explode('/', ltrim($path, '/'));

			foreach ($patterns as $pattern) {
				$pattern = strtr($pattern, '\\', '/');

				if ($neg = substr($pattern, 0, 1) === '!') {
					$pattern = substr($pattern, 1);
				}

				if (strpos($pattern, '/') === FALSE) { // no slash means base name
					if (fnmatch($pattern, end($path), FNM_CASEFOLD)) {
						$res = !$neg;
					}
					continue;

				} elseif (substr($pattern, -1) === '/') { // trailing slash means directory
					$pattern = trim($pattern, '/');
					if (!$isDir && count($path) <= count(explode('/', $pattern))) {
						continue;
					}
				}
				$parts = explode('/', ltrim($pattern, '/'));
				if (fnmatch(
					implode('/', $neg && $isDir ? array_slice($parts, 0, count($path)) : $parts),
					implode('/', array_slice($path, 0, count($parts))),
					FNM_CASEFOLD | FNM_PATHNAME
				)) {
					$res = !$neg;
				}
			}
			return $res;
		}
	}
