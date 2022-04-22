@extends('layouts.master')

@section('title','Posts')
    

@section('content')
    <div class="container-fluid px-4">
      <div class="card my-4">
          <div class="card-header">Posts <a href="{{url('admin/add-post')}}" class="btn btn-primary btn-sm float-end">Add Post</a></div>
          <div class="card-body p-0">
            @if (session('massage'))
                <div class="alert alert-success">{{session('massage')}}</div>
            @endif

           <table class="table table-bordered table-sm">
                <thead class="thead-dark">
                    <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Post name</th>
                    <th scope="col">Post category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $item)
                    <tr class="text-center">
                    <th>{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->status == '1'? 'Hidden': 'Show'}}</td>
                    <td>
                      <a class="btn btn-sm btn-success" href="{{url('admin/edit-post/'.$item->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{url('admin/delete-post/'.$item->id)}}">Delete</a>
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