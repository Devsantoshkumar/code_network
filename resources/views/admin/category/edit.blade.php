@extends('layouts.master')

@section('title','edit category')
    

@section('content')
    <div class="container-fluid px-4">
       <div class="card mt-4">
        <div class="card-header">
            Edit category <a href="{{url('admin/category')}}" class="btn btn-danger btn-sm float-end">Back</a>
        </div>
        <div class="card-body">
        
            @if ($errors->any())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as  $error)
                   <div>{{$error}}</div>
                   @endforeach
                </div>
            @endif

            <form action="{{url('admin/update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group my-2">
                <label for="inputName">Name</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control">
            </div>
            <div class="form-group my-2">
                <label for="inputSlug">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{$category->slug}}">
            </div>
            <div class="form-group my-2">
                <label for="inputImage">Image</label>
                <input type="file" name="image" class="form-control" value="{{$category->image}}">
            </div>
            <div class="form-group my-2">
                <label for="inputDescription">Description</label>
                <textarea name="description" rows="4" class="form-control">{{$category->description}}</textarea>
            </div>
            <div class="h4">SEO Tags</div>
            <div class="form-group my-2">
                <label for="metaTitle">Meta title</label>
                <input type="text" name="metaTitle" class="form-control" value="{{$category->meta_title}}">
            </div>
            <div class="form-group my-2">
                <label for="metaDescription">Meta Description</label>
                <textarea name="metaDescription" rows="4" class="form-control">{{$category->meta_description}}</textarea>
            </div>
            <div class="form-group my-2">
                <label for="metaKeywords">Meta Keywords</label>
                <textarea name="metaKeywords" rows="4" class="form-control">{{$category->meta_keyword}}</textarea>
            </div>
            <div class="row">
                  <div class="form-group col">
                    <div class="form-check">
                    <input class="form-check-input" name="navbarStatus" type="checkbox" id="gridCheck" {{$category->navbar_status == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="gridCheck">
                        Navbar Status
                    </label>
                    </div>
                </div>
                 <div class="form-group col">
                    <div class="form-check">
                    <input class="form-check-input" name="status" type="checkbox" id="gridCheck" {{$category->status == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="gridCheck">
                        Status
                    </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Sign in</button>
            </form>
        </div>
        </div>
    </div>
@endsection