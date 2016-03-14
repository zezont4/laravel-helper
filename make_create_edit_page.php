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

$arabic_label = ucfirst($_SESSION['table_name']);

if (isset($_GET['arabic_label'])) {
    $arabic_label = ucfirst($_GET['arabic_label']);
}

$framework = 'materialize';
if (isset($_GET['framework'])) {
    $framework = ucfirst($_GET['framework']);
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
        <form method="get" action="" class="form-horizontal">
            <div class="form-group ">
                <label for="name" class="control-label col-sm-2">أسم الـ(Model)</label>

                <div class="col-sm-10">
                    <input name="edited-table-name" type="text" class="form-control" value="<?php echo $edited_table_name; ?>">
                </div>
            </div>

            <div class="form-group ">
                <label for="arabic_label" class="control-label col-sm-2">الاسم بالعربي</label>

                <div class="col-sm-10">
                    <input name="arabic_label" type="text" class="form-control" value="<?php echo $arabic_label; ?>">
                </div>
            </div>

            <div class="form-group ">
                <label for="framework" class="control-label col-sm-2">نوع الـ(CSS)</label>

                <div class="col-sm-10">
                    <select class="form-control" name="framework">
                        <option value="bootstrap">bootstrap</option>
                        <option value="materialize" selected>materialize</option>
                    </select>
                </div>
            </div>

            <div class="form-group ">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn material_button btn-primary" type="submit" value="تطبيق">
                </div>
            </div>
        </form>
    </div>
<?php

if ($_SESSION[$_SESSION['table_name'] . 'is_view'] == false) {

    include("pages/route.php");

    include("pages/RouteServiceProvider.php");

    include("pages/artisan.php");

    include("pages/sql.php");

    include("pages/model.php");

    include("pages/request.php");

    include("pages/controller.php");

    include("pages/{$framework}/nav_menu.php");

    include("pages/{$framework}/search.blade.php");

    include("pages/{$framework}/index.blade.php");

    include("pages/{$framework}/create.blade.php");

    include("pages/{$framework}/edit.blade.php");

    include("pages/{$framework}/_form.blade.php");

    include("pages/{$framework}/show.blade.php");
}
include_once($StartDir . "templates/footer.php");