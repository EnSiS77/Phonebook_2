@extends('layouts.app')

@section('content')


<div class="container mb-3">
    <div class="row">
        <form class="mb-3" method="get" action="{{ route('web.search') }}">
            @csrf
            <h2 class="text-center pb-3 text-danger">Страница поиска контактов</h2>
            <div class="form-group mb-1">
                <label class="mb-1" for="query">Текст поиска:</label>
                <input type="text" class="form-control" id="query" name="query" required placeholder="Поиск...">
            </div>
            <button type="submit" class="btn btn-primary mt-2 mb-5">Найти</button>
        </form>

        @isset($contacts)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" value="" id="select_all_ids"></th>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Дата публикации</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($contacts->count() > 0)
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->user_id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="align text-center"><h1>Контактов по таким данным не найдено :(</h1></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        @endisset
    </div>
    @if ($contacts->count() > 0)
        @foreach ($contacts as $contact)
            <!-- выводим контакты -->
        @endforeach
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ $contacts->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    @else
        <!-- выводим сообщение о том, что контактов не найдено -->
    @endif
</div>


@endsection
