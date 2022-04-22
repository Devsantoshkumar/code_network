@extends('layouts.master')

@section('title','Category')
    

@section('content')
    <div class="container-fluid px-4">
        <div class="card my-4">
          <div class="card-header">Category <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add category</a></div>
          <div class="card-body p-0">
            @if (session('massage'))
                <div class="alert alert-success">{{session('massage')}}</div>
            @endif

            <table class="table table-bordered table-sm">
                <thead class="thead-dark">
                    <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($category as $item)
                    <tr class="text-center">
                    <th>{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                      <img src="{{asset('uploads/category/'.$item->image)}}" height="50px" width="50px"/>
                    </td>
                    <td>{{$item->status == '1'? 'Hidden': 'Show'}}</td>
                    <td>
                      <a class="btn btn-sm btn-success" href="{{url('admin/edit-category/'.$item->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{url('admin/delete-category/'.$item->id)}}">Delete</a>
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