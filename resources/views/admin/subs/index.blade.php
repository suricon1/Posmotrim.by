@extends('admin.layouts.layout')

@section('title', 'Admin | Список подписчиков')
@section('key', 'Admin | Список подписчиков')
@section('desc', 'Admin | Список подписчиков')

@section('header-title', 'Список подписчиков')

@section('content')

    <div class="col">
        <div class="form-group">
            <a href="{{route('subscribers.create')}}" class="btn btn-success">Добавить</a>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subs as $subscriber)
                <tr>
                    <td>{{$subscriber->id}}</td>
                    <td>{{$subscriber->email}}
                    </td>
                    <td>
                        {{Form::open(['route'=>['subscribers.destroy', $subscriber->id], 'method'=>'delete'])}}
                        <button onclick="return confirm('Подтвердите удаление подписчика!')" type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fa fa-remove"></i>
                        </button>
                        {{Form::close()}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection