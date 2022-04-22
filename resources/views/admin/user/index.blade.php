@extends('layouts.master')

@section('title','Users')
    

@section('content')
    <div class="container-fluid px-4">
      <div class="card my-4">
          <div class="card-header">Users</div>
          <div class="card-body p-0">
            @if (session('massage'))
                <div class="alert alert-success">{{session('massage')}}</div>
            @endif

           <table id="mydataTable" class="table table-bordered table-sm">
                <thead class="thead-dark">
                    <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr class="text-center">
                        <th>{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->role_as == '1'? 'Admin': 'User'}}</td>
                        <td>
                          <a class="btn btn-sm btn-success" href="{{url('admin/edit-user/'.$item->id)}}">Edit</a>
                          {{-- <a class="btn btn-sm btn-danger" href="{{url('admin/delete-user/'.$item->id)}}">Delete</a> --}}
                        </td>
                        </tr>
                        <tr>
                    @endforeach
                </tbody>
                </table>

          </div>
        </div>
    </div>
@endsection