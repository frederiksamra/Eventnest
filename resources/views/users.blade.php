@extends('layouts.main')
@section('title','Users')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/users/add-form" class="btn btn-primary"><i class="bi bi-plus-square"></i> User</a>
        </div>
        
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usr as $idx => $u)
                    <tr>
                        <td>{{$idx + 1}}</td>
                        <td>{{ $u->name}}</td>
                        <td>{{ $u->email}}</td>
                        <td>
                            @if ($u->image)
                                <img src="{{ asset('/storage/image/'.$u->image) }}" alt="image" width="80" height="80">
                            @else
                                <img src="/storage/image/No_Image_Available.jpg" alt="no image" width="80" height="80">
                            @endif
                        </td>
                        <td>
                            <a href="users/delete/{{ $u->id }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection