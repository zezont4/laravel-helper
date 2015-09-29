
@inject('myForm','App\MyForm()')

@extends('layouts.master',['pageTitle' => 'عرض'])

@section('content')

    <form class='form-horizontal'>
{!! $myForm->formStatic(['label' => 'رقم الجوال', 'name' => 'mobile_no', 'value' => $client->mobile_no]) !!}

{!! $myForm->formStatic(['label' => 'الاسم', 'name' => 'name1', 'value' => $client->name1]) !!}

{!! $myForm->formStatic(['label' => 'الأب', 'name' => 'name2', 'value' => $client->name2]) !!}

{!! $myForm->formStatic(['label' => 'الجد', 'name' => 'name3', 'value' => $client->name3]) !!}

{!! $myForm->formStatic(['label' => 'العائلة', 'name' => 'name4', 'value' => $client->name4]) !!}

{!! $myForm->formStatic(['label' => 'ملاحظات', 'name' => 'notes', 'value' => $client->notes]) !!}

<hr>
    <div class='form-group '>
        <div class='col-sm-offset-3 col-sm-9'>
            <a class='btn material_button btn-primary' href='{{route('client.edit',$client->id)}}'>تعديل</a>
        </div>
    </div>

</form>

@stop