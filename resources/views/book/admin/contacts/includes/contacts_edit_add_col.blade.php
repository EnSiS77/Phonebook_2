@extends('layouts.app')

@section('content')

    <head>
        <link rel="stylesheet" href="Https://cdnjs.cloudflare.com/ajax/libs/bpptstrap/5.2.3/css/bootstrap.min.css">
        <script src="Https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    </head>

    <div class="container d-flex justify-content-center pt-5">
        <div class="col-md-9">
            <h2 class="text-center pb-3 text-danger">Страница создания контактов</h2>

            <form action="{{ route('book.admin.contacts.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <table class="table  table-bordered" id="table">
                    <tr>
                        <th>Ф.И.О.</th>
                        <th>Email</th>
                        <th>Номер телефона</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="inputs[0]['name']" placeholder="Введите Ф.И.О."
                                class="form-control"></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Добавить
                                поле</button></td>
                    </tr>
                </table>



                <button type="submit" class="btn btn-primary col-md-2">Сохранить</button>

            </form>


        </div>
    </div>

    <script>
        $(document).ready(function() {
            var i = 0;
            $('#add').click(function() {
                ++i;
                $('#table').append(
                    `<tr>
                    <td>
                        <input type="text" name="inputs[` + i + `][name]" placeholder="Введите Ф.И.О." class="form-control" />
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-table-row">Удалить поле</button>
                    </td>
                </tr>`
                );
            });
        });

        $(document).on('click', '.remove-table-row', function() {
            $(this).closest('tr').remove();
        });
    </script>




@endsection
