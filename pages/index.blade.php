<?php $htmlCode = "
@extends('layouts.master',['pageTitle' => '$edited_table_name'])

@section('content')

@if(count($" . strtolower($edited_table_name) . "s))

 <table class='table table-hover'>
    <thead>
        <tr>

";
foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $htmlCode .= "\t\t<th><a href=\"{{route('" . strtolower($edited_table_name) . ".index', Input::except('sort') + ['sort' => '".$field_name."']  ) }}\">$table_field[8]</a></th>\n";
        }
    }
}
$htmlCode .= "
        <th>&nbsp;</th>
        </tr>
    </thead>
     @foreach($" . strtolower($edited_table_name) . "s as $" . strtolower($edited_table_name) . ")
    <tr>
   ";
foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $htmlCode .= "\t\t<td>{{ $" . strtolower($edited_table_name) . "->" . $field_name . "  }}</td>\n";
        }
    }
}
$htmlCode .= "
    \t<td><a href=\"{!! route('" . strtolower($edited_table_name) . ".edit',  ['id' => $" . strtolower($edited_table_name) . "->id] ) !!}\">تعديل</a></td>
    @endforeach
    <tr>
</table>
    <div class='container-fluid'>
        {!! $" . strtolower($edited_table_name) . "s->appends(Input::query())->render() !!}
    </div>

    @else
        <div class='alert text-danger text-center'>
            <h3>لا توجد نتائج مطابقة للبحث</h3>

            <h3>No results founts</h3>
        </div>
@endif

@if($" . strtolower($edited_table_name) . "s->currentPage()>=$" . strtolower($edited_table_name) . "s->lastPage())
        @include('layouts.trashed',[
        'modelName' => '" . strtolower($edited_table_name) . "',
        ['trashed' => \$trashed" . $edited_table_name . "s,
         'data' => [
         ";
foreach ($all_table_fields as $table_field) {
    foreach ($checked_fields as $field_name) {
        if (in_array($field_name, $table_field)) {
            $htmlCode .= "\t\t'$table_field[8]' => '$field_name',\n";
        }
    }
}
$htmlCode .= "]
        ]])
@endif
@stop";?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . "/index.blade.php"; ?>
    <h3>
        <span class="pull-left">index.blade.php</span>
        <span>
            <button class="btn btn-success"
                    onclick="selectElementContents(document.getElementById('index_code'))"
                    unselectable="on">تحديد الكود
            </button>
        </span>
    </h3>
    <pre class="language-php" data-language="language-php" style="direction: ltr">
        <code class="language-php" id="index_code">
            <?php
            echo escape($htmlCode);
            writeToFile($filePath, $htmlCode);
            ?>
        </code>
    </pre>
</div>