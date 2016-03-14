<?php $htmlCode = "
@extends('layouts.master')

@section('title','بحث عن " . $arabic_label . "')

{{--@section('container_style','max-width: 602px;')--}}

@section('content')

    {!! Form::open(['route' => '" . strtolower($edited_table_name) . ".index', 'method' => 'get']) !!}

    @include('" . strtolower($edited_table_name) . "._form',['btnLabel' => 'بحث','formType' => 'search'])

    {!! Form::close() !!}

@stop";?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . "/search.blade.php"; ?>
    <h3>
        <span class="pull-left">search.blade.php</span>
        <span>
            <button class="btn btn-success"
                    onclick="selectElementContents(document.getElementById('search_code'))"
                    unselectable="on">تحديد الكود
            </button>
        </span>
    </h3>
    <pre class="language-php" data-language="language-php" style="direction: ltr">
        <code id="search_code" class="language-php">
            <?php
            echo escape($htmlCode);
            writeToFile($filePath, $htmlCode);
            ?>
        </code>
    </pre>
</div>