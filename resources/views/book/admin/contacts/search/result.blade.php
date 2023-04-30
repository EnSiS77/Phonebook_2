@extends('layouts.app')

@section('content')
    <h1>Results</h1>

    <ul>
        @foreach ($results as $result)
            <li><a href="{{ route('search.show', $result->id) }}">{{ $result->name }}</a></li>
        @endforeach
    </ul>
@endsection