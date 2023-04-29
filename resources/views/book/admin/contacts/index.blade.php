@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('book.admin.contacts.includes.result_messages')

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('book.admin.contacts.create') }}" >Создать новый контакт</a>
                    <a href="" class="btn btn-danger" id="deleteAllSelectedRecord">Удалить все выбранные</a>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" value="" id="select_all_ids"></th>
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
                                    <tr id="contacts_ids{{ $contacts->id }}">
                                        <td><input type="checkbox" name="ids" class="checkbox_ids" value="{{ $contacts->id }}"></td>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    
    <script>
        $(function(){
            $("#select_all_ids").click(function(){
                $('.checkbox_ids').prop('checked',$(this).prop('checked'));
            });
    
            $('#deleteAllSelectedRecord').click(function(e){
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function(){
                    all_ids.push($(this).val());
                });
    
                $.ajax({
                    url: "{{ route('contacts.delete') }}",
                    type: "DELETE",
                    data: {
                        ids: all_ids,
                        _token:'{{ csrf_token() }}'
                    },
                    success: function(response){
                        $.each(all_ids, function(key, val){
                            $('#contacts_ids'+val).remove();
                        });
                    }
                });
            });
        });
    </script>
    
    