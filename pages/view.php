<?php
$view_page = "<?php
\$pageTitle = 'عرض';

/*يعدل المسار حسب مجلدات مشروعك*/
\$StartDir = '{$_dir}';
include_once(\$StartDir . 'templates/header.php');

\$pagination = new Zebra_Pagination();
\$records_per_page = 20;
\$limit = ((\$pagination->get_page() - 1) * \$records_per_page);

/*\$logIn = new Login();
\$allowedGroup = 'admin';
if (!\$logIn->hasPermission(\$allowedGroup)) {
    include(\$StartDir . 'templates/not_allowed_msg.php');
}*/
\$pdo = new DB();

//اكتب شروط عبارة الاستعلام هنا
\$whereSQL = '';
\${$table_name}    = \$pdo->query(\"select * from {$table_name} {\$whereSQL} LIMIT {\$limit},\$records_per_page\");
\${$table_name}All = \$pdo->row(\"select count(*) as count_rows from {$table_name} {\$whereSQL}\");
\$rows = \${$table_name}All->count_rows;

\$pagination->records(\$rows);
\$pagination->records_per_page(\$records_per_page);?>
<div class='table-responsive container-fluid'>
    <table class='table table-hover table-striped -table-condensed table-bordered'>
    <thead>
    <tr>
    <th>م</th>
";

foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $view_page .= "\t<th>" . $table_field['Comment'] . "</th>\r\t";
        }
    }
}
if (Session::get($table_name.'is_view') == false) {
    $view_page .= "<th>تعديل</th>";
}
$view_page .= "
        </tr>
        </thead>
        <tbody>
        <?php \$i=\$limit+1;?>
        <?php foreach(\${$table_name} as \$value){ ?>
        <tr>
        <td><?php echo \$i;\$i++?></td>
        ";
foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $view_page .= "\t<td><?php echo \$value->{$table_field['Field']};?></td>\r\t";
        }
    }
}
if (Session::get($table_name.'is_view') == false) {
    $view_page .= "<td><a class='btn btn-default' href='{$table_name}_edit.php?{$primary_key}=<?php echo \$value->{$primary_key};?>'>تعديل</a> </td>";
}
$view_page .= "
        </tr>
            <?php } ?>
            </tbody>
            </table>
            <?php \$pagination->render(); ?>
            </div>
<?php include_once(\$StartDir . 'templates/footer.php');?>";
?>

<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . $table_name . "_view.php"; ?>
    <h3>
        <span class="pull-left">view.php</span>
        <span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('edit_code'))"
                      unselectable="on">تحديد الكود</span></button>
        <span><a class="btn btn-success" href="<?php echo $filePath; ?>" target="_blank">معاينة الصفحة</a></span>
    </h3>
<pre class="language-php" data-language="language-php" style="direction: ltr">
            <code id="edit_code" class="language-php ">
                <?php
                echo escape($view_page);
                writeToFile($filePath, $view_page);
                ?>
            </code>
        </pre>
</div>