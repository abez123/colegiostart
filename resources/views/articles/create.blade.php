@extends('app')

@section('content')

    <h1>Escribe una Nota</h1>
    <hr>

    {!! Form::open(['url' => 'articles']) !!}
        @include('articles._form', ['submitButtonText' => 'Add article'])
    {!! Form::close() !!}


    @include('errors.list')

@endsection
@stop