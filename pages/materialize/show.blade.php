<?php
$htmlCode = "
@extends('layouts.master')

@inject('myForm','App\\MaterializeForm()')

@section('title','تفاصيل " . $arabic_label . "')

{{--@section('container_style','max-width: 602px;')--}}

@section('content')
    <form>
    <div class='row'>
";
foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $htmlCode .= "{!! \$myForm->formStatic(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "', 'value' => " . '$' . strtolower($edited_table_name) . '->' . $field_name . "]) !!}\n\n";
        }
    }
}
$htmlCode .= "
    </div>
        <div class='section'>
        <a class='waves-effect waves-light btn' href='{{route('" . strtolower($edited_table_name) . ".edit',$" . strtolower($edited_table_name) . "->id)}}'>تعديل</a>
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