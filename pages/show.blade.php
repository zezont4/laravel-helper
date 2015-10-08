<?php
$htmlCode = "
@inject('myForm','App\\MyForm()')

@extends('layouts.master',['pageTitle' => 'عرض'])

@section('content')

    <form class='form-horizontal'>
";
foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $htmlCode .= "{!! \$myForm->formStatic(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "', 'value' => " . '$' . strtolower($edited_table_name) . '->' . $field_name . "]) !!}\n\n";
        }
    }
}
$htmlCode .= "<hr>
    <div class='form-group '>
        <div class='col-sm-offset-3 col-sm-9'>
            <a class='btn material_button btn-primary' href='{{route('" . strtolower($edited_table_name) . ".edit',$" . strtolower($edited_table_name) . "->id)}}'>تعديل</a>
        </div>
    </div>

</form>

@stop";
?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . "/show.blade.php"; ?>

    <h3>
        <span class="pull-left">show.blade.php</span>
        <span>
            <button class="btn btn-success"
                    onclick="selectElementContents(document.getElementById('show_code'))"
                    unselectable="on">تحديد الكود
            </button>

        </span>
    </h3>
    <pre class="language-php" data-language="language-php" style="direction: ltr">
        <code id="show_code" class="language-php ">
            <?php
            echo escape($htmlCode);
            writeToFile($filePath, $htmlCode);
            ?>
        </code>
    </pre>
</div>