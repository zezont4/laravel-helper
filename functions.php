<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();


$GLOBALS['config'] = [
	'root_dir' => '/laravel-helper/',
	'host'     => 'localhost',
	'user'     => 'root',
	'pass'     => '',
	'db_name'  => ''
];

spl_autoload_register(function ($class) {
	require_once 'class/' . $class . '.php';
});

function escape($string)
{
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function writeToFile($fineName, $content)
{
	$myfile = fopen($fineName, "w") or die("Unable to open file!");
	fwrite($myfile, $content);
	fclose($myfile);
}

function recursiveRemove($dir)
{
	$structure = glob(rtrim($dir, "/") . '/*');
	if (is_array($structure)) {
		foreach ($structure as $file) {
			if (is_dir($file)) recursiveRemove($file);
			elseif (is_file($file)) unlink($file);
		}
	}
	//	@rmdir($dir);
}
