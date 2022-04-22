@extends('layouts.master')

@section('title','add post')
    

@section('content')
    <div class="container-fluid px-4">
      <div class="card my-4">
          <div class="card-header">Add Post <a href="{{url('admin/add-post')}}" class="btn btn-primary btn-sm float-end">Add Post</a></div>
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as  $error)
                   <div>{{$error}}</div>
                   @endforeach
                </div>
            @endif

            <form action="{{url('admin/add-post')}}" method="POST">
            @csrf
            <div class="form-group my-2">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter name">
            </div>
            <div class="form-group my-2">
                <label for="inputSlug">Slug</label>
                <input type="text" name="slug" class="form-control" id="inputSlug" placeholder="Write description">
            </div>
             <div class="form-group">
                <label for="category">Category</label>
                <select class="form-select" name="category_id">
                  <option selected>Select Category</option>
                @foreach ($category as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group my-2">
                <label for="frame">YT Iframe</label>
                <input type="text" name="yt_iframe" class="form-control" id="inputSlug" placeholder="Write description">
            </div>
            <div class="form-group my-4">
                <label for="inputDescription">Description</label>
                <textarea name="description" rows="4" class="form-control" placeholder="Description"></textarea>
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