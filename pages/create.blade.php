<?php $create_page = "
@extends('layouts.master',['pageTitle' => 'إضافة'])

@section('content')

    {!! Form::open(['route' => '" . strtolower($edited_table_name) . ".store','role'=>'form','class' => 'form-horizontal']) !!}

    @include('" . strtolower($edited_table_name) . "._form',['btnLabel' => 'إضافة','formType' => 'create'])

    {!! Form::close() !!}

@stop";?>
<div class="clearfix col-xs-12">
    <hr>
    <?php $filePath = $outputDir . "/create.blade.php"; ?>
    <h3>
        <span class="pull-left">create.blade.php</span>
        <span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('create_code'))"
                      unselectable="on">تحديد الكود
            </button></span>
        <span><a class="btn btn-success" href="<?php echo $filePath; ?>" target="_blank">معاينة الصفحة</a></span>
    </h3>
<pre class="language-php" data-language="language-php" style="direction: ltr">
            <code class="language-php" id="create_code">
                <?php
                echo escape($create_page);
                writeToFile($filePath, $create_page);
                ?>
            </code>
        </pre>
</div>