<?php
$primary_key = Session::get('primary_key');
$delete_page = "<?php
\$pageTitle = 'حذف';

/*يعدل المسار حسب مجلدات مشروعك*/
\$StartDir = '{$_dir}';
include_once(\$StartDir . 'templates/header.php');
/*\$logIn = new Login();
\$allowedGroup = 'admin';
if (!\$logIn->hasPermission(\$allowedGroup)) {
    include(\$StartDir . 'templates/not_allowed_msg.php');
}*/
\$pdo = new DB();

\$dbResult = \$pdo->query('DELETE FROM {$table_name} WHERE {$primary_key}=:{$primary_key}', [':{$primary_key}' => Input::get('{$primary_key}')]);
if (\$dbResult > 0) {
    \$_SESSION['RSMSG'][] = array(1, 'تم الحذف بنجاح.');
}
header('Location:{$table_name}_view.php');";
?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath=$outputDir.$table_name."_delete.php";?>
    <h3>
        <span class="pull-left">delete.php</span>
        <span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('edit_code'))" unselectable="on">تحديد الكود</span></button>
<!--        <span><a class="btn btn-success" href="--><?php //echo $filePath."?{$primary_key}=1";?><!--" target="_blank">معاينة الصفحة</a></span>-->
    </h3>
<pre class="language-php" data-language="language-php" style="direction: ltr">
            <code id="edit_code" class="language-php ">
                <?php
                echo escape($delete_page);
                writeToFile($filePath,$delete_page);
                ?>
            </code>
        </pre>
</div>