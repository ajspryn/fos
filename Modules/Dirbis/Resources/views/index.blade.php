@extends('dirbis::layouts.main')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('dirbis.name') !!}
    </p>
@endsection
