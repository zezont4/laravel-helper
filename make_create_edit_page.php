<?php
$pageTitle = 'كود الإضافة والتعديل';
$StartDir = '';
include_once($StartDir . 'templates/header.php');
$checked_fields = Session::get('checked_fields');
$db_name = Session::get('db_name');

$table_name = Session::get('table_name');
$edited_table_name = ucfirst(Session::get('table_name'));
if (isset($_GET['edited-table-name'])) {
	$edited_table_name = ucfirst($_GET['edited-table-name']);
}
$elements_type = Session::get('elements_type');
$field_is_required = Session::get('field_is_required');
$outputDir = Session::get('outputDir') . '/' . strtolower($edited_table_name);
$primary_key = Session::get('primary_key');

recursiveRemove('output');

if (!file_exists($outputDir)) {
	@mkdir(Session::get('outputDir'));
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

if (Session::get(Session::get('table_name') . 'is_view') == false) {

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

//	include('pages/delete.php');
//	include('pages/view.php');
}


include_once($StartDir . 'templates/footer.php');