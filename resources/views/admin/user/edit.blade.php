@extends('layouts.master')

@section('title','edit user')
    

@section('content')
    <div class="container-fluid px-4">
       <div class="card mt-4">
        <div class="card-header">
            Edit user
        </div>
        <div class="card-body">
        
            @if ($errors->any())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as  $error)
                   <div>{{$error}}</div>
                   @endforeach
                </div>
            @endif

            <form action="{{url('admin/update-user/'.$user->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group my-2">
                <label for="inputName">Name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="form-group my-2">
                <label for="inputSlug">Email</label>
                <input type="text" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group my-2">
                <label for="inputSlug">Created At</label>
                <p class="border p-2 rounded">{{$user->created_at->format('d/m/y')}}</p>
            </div>
            <div class="form-group">
                <label for="category">Role</label>
                <select class="form-select" name="roleName" required>
                  <option value="1" {{$user->role_as == '1'? 'selected':''}}>Admin</option>
                  <option value="2" {{$user->role_as == '2'? 'selected':''}}>Blogger</option>
                  <option value="0" {{$user->role_as == '0'? 'selected':''}}>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update user</button>
            </form>
        </div>
        </div>
    </div>
@endsection