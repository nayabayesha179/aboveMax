
@extends('layouts.homePage')
@section('title','Employee')

@section('content')
    @if(Route::currentRouteName()=='employee.index')
        <section id="basic-datatable">
            @include('contents.employee.data')
        </section>
    @endif
    @if(Route::currentRouteName()=='employee.create')
        @include('contents.employee.form')
    @endif
    @if(Route::currentRouteName()=='employee.show')
        @include('contents.employee.edit')
    @endif

@endsection
