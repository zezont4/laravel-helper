<?php
$pageTitle = 'حدد الجدول';
$StartDir = '';
$view = '';
include_once($StartDir . 'templates/header.php');

$db_name = $_GET['db_name'];
$_SESSION['db_name'] = $db_name;

$outputDir = "output/$db_name/";
$_SESSION['outputDir'] = $outputDir;

$pdo = new PDO("mysql:dbname={$db_name};host=" . Config::get('host'), Config::get('user'), Config::get('pass'), [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);

$dbs = $pdo->query("SHOW FULL TABLES");
//var_dump($dbs->fetchAll());
?>
<ul class="nav nav-pills nav-stacked -nav-tabs-justified text-left">
	<?php foreach ($dbs as $db) {
		$view = '';
		$_SESSION[$db[0] . 'is_view'] = false;
		if ($db['Table_type'] == 'VIEW') {
			$view = $db['Table_type'] == 'VIEW' ? '<span class="text-danger">[ استعلام ]</span>' : '';
			$_SESSION[$db[0] . 'is_view'] = true;
		}
		echo "<li><a href='fields.php?table_name={$db[0]}'>{$db[0]} $view </a>  </li>";
	} ?>
</ul>
<?php include_once($StartDir . 'templates/footer.php'); ?>
