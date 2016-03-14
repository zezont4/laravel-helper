<?php
$edit_page = "
@extends('layouts.master')

@section('title','تعديل " . $arabic_label . "')

@inject('myForm','App\\MaterializeForm()')

{{--@section('container_style','max-width: 602px;')--}}

@section('content')

    {!! Form::model($" . strtolower($edited_table_name) . ", ['route' => ['" . strtolower($edited_table_name) . ".update', $" . strtolower($edited_table_name) . "->id], 'method' => 'put']) !!}

    @include('" . strtolower($edited_table_name) . "._form',['btnLabel' => 'تحديث','formType' => 'update'])

    {!! Form::close() !!}

    @if($" . strtolower($edited_table_name) . "->trashed())

         <p class='left red-text lighten-2 mid-size-font'>هذا السجل محذوف</p>

        {!! Form::open(['route' => ['" . strtolower($edited_table_name) . ".restore', \$" . strtolower($edited_table_name) . "->id]]) !!}
        {!! \$myForm->formButton(['label' => 'استعادة', 'class' => 'left btn-flat waves-green green-text']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['" . strtolower($edited_table_name) . ".destroy', \$" . strtolower($edited_table_name) . "->id], 'method' => 'delete']) !!}
        {!! \$myForm->formButton(['label' => ' حذف', 'class' => 'left btn-flat waves-red red-text']) !!}
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