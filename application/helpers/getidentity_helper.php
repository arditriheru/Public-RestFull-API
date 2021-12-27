<?php

/**
 * Helpher untuk menampilkan identitas aplikasi
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Ardi Tri Heru (arditriheruh@gmail.com)
 * @link https://github.com/arditriheru
 */

if (!function_exists('getTopTitle')) {
	function getTopTitle()
	{
		$getTopTitle = "Public Rest Full API";
		return $getTopTitle;
	}
}


if (!function_exists('getTitle')) {
	function getTitle()
	{
		$getTitle = "S E M I N A R";
		return $getTitle;
	}
}

if (!function_exists('getCopyright')) {
	function getCopyright()
	{
		$getCopyright = "Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script></b> <a expr:href='data:blog.homepageUrl'><data:blog.title/></a> <a href='https://arditriheru.com/' target='blank'> Fakultas Hukum UII</a>";
		return $getCopyright;
	}
}

if (!function_exists('getVersion')) {
	function getVersion()
	{
		$getVersion = "<a style='color:grey' href='https://arditriheru.com/' target='blank'>Dev : Ardi Tri Heru</a>";
		return $getVersion;
	}
}
