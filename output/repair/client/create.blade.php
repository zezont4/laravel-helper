
@extends('layouts.master',['pageTitle' => 'إضافة'])

@section('content')

    {!! Form::open(['route' => 'client.index','role'=>'form','class' => 'form-horizontal']) !!}

    @include('client._form',['btnLabel' => 'بحث','formType' => 'create'])

    {!! Form::close() !!}

@stop
