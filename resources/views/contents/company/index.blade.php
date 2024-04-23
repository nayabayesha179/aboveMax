
@extends('layouts.homePage')
@section('title','Company')

@section('content')
    @if(Route::currentRouteName()=='company.index')
        <section id="basic-datatable">
            @include('contents.company.data')
        </section>
    @endif
    @if(Route::currentRouteName()=='company.create')
        @include('contents.company.form')
    @endif
    @if(Route::currentRouteName()=='company.show')
        @include('contents.company.edit')
    @endif

@endsection
