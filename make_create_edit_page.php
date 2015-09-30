<?php
$pageTitle = 'كود الإضافة والتعديل';
$StartDir = '';
include_once($StartDir . 'templates/header.php');
$checked_fields = $_SESSION['checked_fields'];
$db_name = $_SESSION['db_name'];

$table_name = $_SESSION['table_name'];
$edited_table_name = ucfirst($_SESSION['table_name']);
if (isset($_GET['edited-table-name'])) {
	$edited_table_name = ucfirst($_GET['edited-table-name']);
}
$elements_type = $_SESSION['elements_type'];
$field_is_required = $_SESSION['field_is_required'];
$outputDir = $_SESSION['outputDir'] . '/' . strtolower($edited_table_name);
$primary_key = $_SESSION['primary_key'];

recursiveRemove('output');

if (!file_exists($outputDir)) {
	@mkdir($_SESSION['outputDir']);
	@mkdir($outputDir);
}
$pdo = new PDO("mysql:dbname={$db_name};host=" . Config::get('host'), Config::get('user'), Config::get('pass'), [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
$dbs = $pdo->prepare("SHOW FULL COLUMNS FROM $table_name");
$dbs->execute();
$all_table_fields = $dbs->fetchAll();
?>
	<div class="clearfix container-fluid">
		<form method="get" action="">
			<div class="col-sm-2">
				<input name="edited-table-name" style="direction: ltr;" type="text" placeholder="اسم الجدول" class="form-control text-center" value="<?php echo $edited_table_name; ?>"></div>
			<div class="col-sm-2 pull-left">
				<button class="btn btn-block btn-primary" type="submit">تطبيق</button>
			</div>
		</form>
	</div>
<?php

if ($_SESSION[$_SESSION['table_name'] . 'is_view'] == false) {

	include('pages/route.php');

	include('pages/RouteServiceProvider.php');

	include('pages/artisan.php');

	include('pages/model.php');

	include('pages/request.php');

	include('pages/controller.php');

	include('pages/create.blade.php');

	include('pages/edit.blade.php');

	include('pages/_form.blade.php');

	include('pages/show.blade.php');

	include('pages/search.blade.php');

}
include_once($StartDir . 'templates/footer.php');