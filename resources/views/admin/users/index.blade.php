@extends('admin.layouts.layout')

@section('header-title', 'Список пользователей')

@section('content')

    <div class="form-group">
        <a href="{{route('users.create')}}" class="btn btn-success">Добавить</a>
    </div>
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Аватар</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <img src="{{$user->getImage()}}" alt="" class="img-responsive" width="150">
                    </td>
                    <td>
                        <div class="btn-group" id="nav">
                            <a class="btn btn-outline-primary btn-sm" href="{{route('users.edit', $user->id)}}" role="button"><i class="fa fa-pencil"></i></a>
                        {{Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('Подтвердите удаление пользователя!')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>
                        {{Form::close()}}
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection