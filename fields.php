<?php
$pageTitle = 'حدد الحقول';
$StartDir = '';
include_once($StartDir . 'templates/header.php');
$db_name = Session::get('db_name');
$table_name = $_GET['table_name'];
Session::put('table_name', $table_name);

$pdo = new PDO("mysql:dbname={$db_name};host=" . Config::get('host'), Config::get('user'), Config::get('pass'), [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
$dbs = $pdo->prepare("SHOW FULL COLUMNS FROM $table_name");
$dbs->execute();
$table_fields = $dbs->fetchAll();
//Session::put('table_fields', $table_fields);
//var_dump($table_fields);
$i = 1;
?>

    <form action="redirect.php" method="post">
        <table class="table table-hover table-condensed">
            <thead>
            <tr>
                <th><input type="checkbox" id="selecctall"/> تحديد</th>
                <th> اسم الحقل</th>
                <th> الوصف</th>
                <th> النوع</th>
                <th> فارغ</th>
                <th> مفتاح</th>
                <th> ملاحظات</th>
                <th>نوع الحقل</th>
                <th><input type="checkbox" id="selecctall2"/> إلزامي</th>
            </tr>
            </thead>
            <tbody id="sortable">
            <?php
            foreach ($table_fields as $db) {
                $primaryKey = ($db['Extra'] == 'auto_increment') ? $db['Field'] : 'id';
                Session::put('primary_key', $primaryKey);
                $key = str_replace('PRI', 'مفتاح', $db['Key']);
                $key = str_replace('UNI', 'فريد', $key);
                $key = str_replace('MUL', 'مفهرس', $key);
                $extra = str_replace('auto_increment', 'ترقيم تلقائي', $db['Extra']);
                ?>
                <tr class="ui-state-default <?php echo($db['Key'] == 'PRI' ? 'bg-success' : ''); ?>">
                    <td>
                        <input type="checkbox" name="field_name[]" <?php echo($db['Key'] != 'PRI' ? 'checked' : ''); ?>
                               value="<?php echo $db['Field']; ?>">
                    </td>
                    <td style="direction: ltr"><?php echo $db['Field']; ?></td>
                    <td><?php echo $db['Comment']; ?></td>
                    <td style="direction: ltr"><?php echo $db['Type']; ?></td>
                    <td class="<?php echo($db['Null'] == 'NO' ? 'bg-warning' : ''); ?>"><?php echo $db['Null']; ?></td>
                    <td class="<?php echo($db['Key'] == 'UNI' ? 'bg-success' : ''); ?>"><?php echo $key; ?></td>
                    <td class="<?php echo($db['Extra'] == 'auto_increment' ? 'bg-success' : ''); ?>"><?php echo $extra; ?></td>
                    <td>
                        <select class="form-control" name="type_<?php echo $db['Field']; ?>">
                            <option value="text">نصي</option>
                            <option value="select">قائمة منسدلة</option>
                            <option <?php echo(stristr($db['Type'], 'tinyint') ? 'selected' : ''); ?> value="radio">
                                خيارات متعددة
                            </option>
                            <option value="checkbox">مربع اختيار</option>
                        </select>

                    </td>
                    <td><input type="checkbox" name="field_is_required_<?php echo $db['Field']; ?>" value="required">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <hr>
        <div class="col-sm-3 pull-left">
            <button name="create_edit" value="create_edit" class="btn btn-primary btn-block btn-primary" type="submit">
                <span class="glyphicon glyphicon-edit"></span>
                &nbsp;&nbsp; إنشاء الصفحات
            </button>
        </div>
    </form>

    <style>
        .ui-state-highlight {
            height: 1.5em;
            line-height: 1.2em;
            background-color: #eee
        }
    </style>
    <script>
        $(function () {

            $('#selecctall').click(function (event) {  //on click
                var chkbox = $('input:checkbox[name^=field_name]');
                if (this.checked) { // check select status
                    $(chkbox).each(function () { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"
                    });
                } else {
                    $(chkbox).each(function () { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"
                    });
                }
            });

            $('#selecctall2').click(function (event) {  //on click
                var chkbox = $('input:checkbox[name^=field_is_required_]');
                if (this.checked) { // check select status
                    $(chkbox).each(function () { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"
                    });
                } else {
                    $(chkbox).each(function () { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"
                    });
                }
            });

            $("#sortable").sortable({
                placeholder: "ui-state-highlight"
            });
            $("#sortable").disableSelection();
        });
    </script>
    <!--    echo $db['Field'].' : '.$db['Comment'].'<br>';-->
<?php include_once($StartDir . 'templates/footer.php');
