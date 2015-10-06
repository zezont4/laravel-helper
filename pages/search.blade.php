<?php $htmlCode = "
@inject('myForm','App\\MyForm()')
@extends('layouts.master',['pageTitle' => 'بحث'])

@section('content')

    {!! Form::open(['route' => '" . strtolower($edited_table_name) . ".index','role'=>'form', 'method' => 'get', 'class' => 'form-horizontal']) !!}\n\t\t";

foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $type = $elements_type['type_' . $table_field[0]];
            if ($type == 'text') {

                $htmlCode .= "{!! \$myForm->formText(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "']) !!}\n\n";

            } elseif ($type == 'select') {

                $htmlCode .= "{!! \$myForm->formSelect(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "', 'values' => ['' => 'اختر من القائمة '] + \$myForm->yes_no]) !!}\n\n";

            } elseif ($type == 'radio') {

                $htmlCode .= "{!! \$myForm->formRadio(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "', 'values' => \$myForm->yes_no]) !!}\n\n";

            } elseif ($type == 'checkbox') {

                $htmlCode .= "{!! \$myForm->formCheck(['label' => '" . $table_field[8] . "', 'name' => '" . $field_name . "', 'values' => \$myForm->yes_no) !!}\n\n";

            }

        }
    }
}

$htmlCode .= "
        <hr>
        {!! \$myForm->formButton(['label' => 'بحث', 'class' => 'primary']) !!}

    {!! Form::close() !!}

@stop";?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . "/search.blade.php"; ?>
    <h3>
        <span class="pull-left">search.blade.php</span>
        <span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('search_code'))"
                      unselectable="on">تحديد الكود
            </button></span>
    </h3>
    <pre class="language-php" data-language="language-php" style="direction: ltr">
        <code class="language-php" id="search_code">
            <?php
            echo escape($htmlCode);
            writeToFile($filePath, $htmlCode);
            ?>
        </code>
    </pre>
</div>