<?php
$edit_page = "
@inject('myForm','App\\MyForm()')

@extends('layouts.master',['pageTitle' => 'تعديل'])

@section('content')

    {!! Form::model($" . strtolower($edited_table_name) . ", ['route' => ['" . strtolower($edited_table_name) . ".update', $" . strtolower($edited_table_name) . "->id], 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal']) !!}
    @include('" . strtolower($edited_table_name) . "._form',['btnLabel' => 'تحديث','formType' => 'update'])
    {!! Form::close() !!}

    @if($" . strtolower($edited_table_name) . "->trashed())
        <div class='col-md-6'>
            <h4 class='text-danger text-center'>هذا السجل محذوف</h4>
        </div>

        {!! Form::open(['route' => ['" . strtolower($edited_table_name) . ".restore', $" . strtolower($edited_table_name) . "->id], 'class' => 'form-horizontal']) !!}
        {!! \$myForm->formButton(['label' => 'استعادة', 'class' => 'success']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['" . strtolower($edited_table_name) . ".destroy', $" . strtolower($edited_table_name) . "->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
        {!! \$myForm->formButton(['label' => ' حذف', 'class' => 'danger']) !!}
        {!! Form::close() !!}
    @endif

@stop";
?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . "/edit.blade.php";?>
    <h3>
        <span class="pull-left">edit.blade.php</span>
    <span>
        <button class="btn btn-success"
                onclick="selectElementContents(document.getElementById('edit_code'))"
                unselectable="on">تحديد الكود
        </button>
    </span>
    </h3>
<pre class="language-php" data-language="language-php" style="direction: ltr">
            <code id="edit_code" class="language-php ">
                <?php
                echo escape($edit_page);
                writeToFile($filePath, $edit_page);
                ?>
            </code>
        </pre>
</div>