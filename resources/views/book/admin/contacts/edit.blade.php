@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Phonebook $item */
    @endphp

    <div class="container">
        

        @include('book.admin.contacts.includes.result_messages')

        @if ($item->exists)
            <form method="POST" action="{{ route('book.admin.contacts.update', $item->id) }}">
                @method('PATCH')
            @else
                <form method="POST" action="{{ route('book.admin.contacts.store') }}">
        @endif

        @csrf


        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('book.admin.contacts.includes.contacts_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('book.admin.contacts.includes.contacts_edit_add_col')
            </div>
        </div>
        </form>

        @if ($item->exists)
            <br>
            <form method="POST" action="{{ route('book.admin.contacts.destroy', $item->id) }}">
                @method('DELETE')
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-block">
                            <div class="card-body ml-auto">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Удалить
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </form>
        @endif
    </div>


@endsection
