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
            $htmlCode .= "<th>$table_field[8]</th>\n";
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
            $htmlCode .= "\t\t<td>{{ $" . strtolower($edited_table_name) . "->".$field_name."  }}</td>\n";
        }
    }
}
$htmlCode .= "
    \t<td><a href=\"{!! route('" . strtolower($edited_table_name) . ".edit',  ['id' => $" . strtolower($edited_table_name) . "->id] ) !!}\">تعديل</a></td>
    @endforeach
    <tr>
</table>
@endif
@stop
";?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . "/index.blade.php"; ?>
    <h3>
        <span class="pull-left">index.blade.php</span>
        <span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('index_code'))" unselectable="on">تحديد الكود</button></span>
        <span><a class="btn btn-success" href="<?php echo $filePath; ?>" target="_blank">معاينة الصفحة</a></span>
    </h3>
    <pre class="language-php" data-language="language-php" style="direction: ltr">
        <code class="language-php" id="index_code">
            <?php
            echo escape($htmlCode);
            writeToFile($filePath, $create_page);
            ?>
        </code>
    </pre>
</div>