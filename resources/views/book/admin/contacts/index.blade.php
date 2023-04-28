@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('book.admin.contacts.includes.result_messages')

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('book.admin.contacts.create') }}" >Написать</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Автор</th>
                                    <th>Ф.И.О.</th>
                                    <th>Email</th>
                                    <th>Номер телефона</th>
                                    <th>Дата публикации</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paginator as $contacts)
                                    @php
                                        /** @var \App\Model\Phonebook $contacts */
                                    @endphp
                                    <tr>
                                        <td>{{ $contacts->id  }}</td>
                                        <td>{{ $contacts->user->name  }}</td>
                                        <td>
                                            <a href="{{ route('book.admin.contacts.edit', $contacts->id) }}">{{ $contacts->name }}</a>
                                        </td>
                                        <td>{{ $contacts->email  }}</td>
                                        <td>{{ $contacts->phone  }}</td>
                                        <td>{{ \Carbon\Carbon::parse($contacts->published_at)->format('d.M H:i') }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($paginator->hasPages())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>    
@endsection