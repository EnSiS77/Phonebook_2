@extends('layouts.app')

@section('content')
    <h1>{{ $searchable->name }}</h1>

    <p>id: {{ $searchable->id }}</p>
    <p>Phone: {{ $searchable->phone }}</p>
    <p>Email: {{ $searchable->email }}</p>
    <p>Author: {{ $searchable->author }}</p>
@endsection
