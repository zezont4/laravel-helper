<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
//$root = '/wc/';
//$settings = parse_ini_file("config.php");

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
//$server = $settings['host'];
//$user = $settings['user'];
//$pass = $settings['pass'];

if (!function_exists("escape")) {
	function escape($string)
	{
		return htmlentities($string, ENT_QUOTES, 'UTF-8');
	}
}

if (!function_exists("show_msg")) {
	/**
	 * عرض رسالة بعد عملة الإضافة أو التعديل على قاعدة البيانات
	 * @param Array [$sessionName =array(] مصفوفة تحتوي على بيانات الرسالة
	 */
	function show_msg($sessionName = array())
	{
		foreach ($sessionName as $key => $msg) {
			$msg_type = $msg[0];
			$msg_text = $msg[1];
			$delay = 60000;
			switch ($msg_type) {
				case 1:
					$msg_type = 'success';
					break;
				case 2:
					$msg_type = 'log';
					break;
				case 3:
					$msg_type = 'error';
					break;
			}
			echo '<script>
                    $(function(){
                        alertify.set({ delay: ' . $delay . ' });
                        alertify.' . $msg_type . '("' . $msg_text . '");
                    });
                 </script>';
		}
		Session::delete(Config::get('session/sql_result_msg'));
	}
}

if (!function_exists("StringToDate")) {
	function StringToDate($strDate)
	{
		$tm_Date = ($strDate != "") ? substr($strDate, 0, 4) . "/" . substr($strDate, 4, 2) . "/" . substr($strDate, 6, 2) : null;

		return $tm_Date;
	}
}

if (!function_exists("queryToArray")) {
	/**
	 * تنفيذ استعلام مكون من حقلين فقط
	 * ثم تعبئة النتيجة في مصفوفة
	 * @param   String $sqlString عبارة الاستعلام
	 * @returns Array  النتيجة في مصفوفة
	 */
	function queryToArray($sqlString, $where = null)
	{
		$queryArray = '';
		$pdoQuery = new DB();
		$queryResult = $pdoQuery->query($sqlString, $where, PDO:: FETCH_NUM);
		foreach ($queryResult as $row) {
			$queryArray[$row[0]] = $row[1];
		}

		return $queryArray;
	}
}

if (!function_exists("writeToFile")) {

	function writeToFile($fineName, $content)
	{
		$myfile = fopen($fineName, "w") or die("Unable to open file!");
		fwrite($myfile, $content);
		fclose($myfile);
	}
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
	@rmdir($dir);
}