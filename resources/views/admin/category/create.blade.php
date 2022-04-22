@extends('layouts.master')

@section('title','add category')
    

@section('content')
    <div class="container-fluid px-4">
       <div class="card mt-4">
        <div class="card-header">
            Category
        </div>
        <div class="card-body">
        
            @if ($errors->any())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as  $error)
                   <div>{{$error}}</div>
                   @endforeach
                </div>
            @endif

            <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-2">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter name">
            </div>
            <div class="form-group my-2">
                <label for="inputSlug">Slug</label>
                <input type="text" name="slug" class="form-control" id="inputSlug" placeholder="Write description">
            </div>
            <div class="form-group my-2">
                <label for="inputImage">Image</label>
                <input type="file" name="image" class="form-control" id="inputImage" placeholder="Write description">
            </div>
            <div class="form-group my-2">
                <label for="inputDescription">Description</label>
                <textarea name="description" rows="4" class="form-control"></textarea>
            </div>
            <div class="h4">SEO Tags</div>
            <div class="form-group my-2">
                <label for="metaTitle">Meta title</label>
                <input type="text" name="metaTitle" class="form-control" id="metaTitle" placeholder="Meta title">
            </div>
            <div class="form-group my-2">
                <label for="metaDescription">Meta Description</label>
                <textarea name="metaDescription" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group my-2">
                <label for="metaKeywords">Meta Keywords</label>
                <textarea name="metaKeywords" rows="4" class="form-control"></textarea>
            </div>
            <div class="row">
                  <div class="form-group col">
                    <div class="form-check">
                    <input class="form-check-input" name="navbarStatus" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Navbar Status
                    </label>
                    </div>
                </div>
                 <div class="form-group col">
                    <div class="form-check">
                    <input class="form-check-input" name="status" type="checkbox" id="gridCheck">
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