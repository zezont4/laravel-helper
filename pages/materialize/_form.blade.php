<?php
$htmlCode = "
@inject('myForm','App\\MaterializeForm()')

<?php \$myForm->errors = \$errors;?>

";
foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $type = $elements_type['type_' . $table_field[0]];
            if ($type == 'text') {

                $htmlCode .= "{!! \$myForm->formText(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "']) !!}\n\n";

            } elseif ($type == 'password') {

                $htmlCode .= "{!! \$myForm->formPassword(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "']) !!}\n\n";

            } elseif ($type == 'select') {

                $htmlCode .= "{!! \$myForm->formSelect(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "', 'values' => ['' => 'اختر من القائمة '] + \$myForm->yes_no]) !!}\n\n";

            } elseif ($type == 'radio') {

                $htmlCode .= "{!! \$myForm->formRadio(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "', 'values' => \$myForm->yes_no]) !!}\n\n";

            } elseif ($type == 'checkbox') {

                $htmlCode .= "{!! \$myForm->formCheck(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "', 'values' => \$myForm->yes_no]) !!}\n\n";

            }

        }
    }
}
$htmlCode .= "
{!! \$myForm->formButton(['label' => \$btnLabel, 'class' => 'waves-light btn']) !!}";
?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . "/_form.blade.php"; ?>

    <h3>
        <span class="pull-left">_form.blade.php</span>
        <span>
            <button class="btn btn-success"
                    onclick="selectElementContents(document.getElementById('form_code'))"
                    unselectable="on">تحديد الكود
            </button>
        </span>
    </h3>
    <pre class="language-php" data-language="language-php" style="direction: ltr">
        <code id="form_code" class="language-php ">
            <?php
            echo escape($htmlCode);
            writeToFile($filePath, $htmlCode);
            ?>
        </code>
    </pre>
</div>