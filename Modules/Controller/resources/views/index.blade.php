@extends('controller::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('controller.name') !!}</p>
@endsection
