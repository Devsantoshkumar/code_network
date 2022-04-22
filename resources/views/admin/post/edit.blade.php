@extends('layouts.master')

@section('title','edit post')
    

@section('content')
    <div class="container-fluid px-4">
      <div class="card my-4">
          <div class="card-header">Edit Post <a href="{{url('admin/posts')}}" class="btn btn-danger btn-sm float-end">Back</a></div>
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as  $error)
                   <div>{{$error}}</div>
                   @endforeach
                </div>
            @endif

            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group my-2">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" value="{{$post->name}}">
            </div>
            <div class="form-group my-2">
                <label for="inputSlug">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{$post->slug}}">
            </div>
             <div class="form-group">
                <label for="category">Category</label>
                <select class="form-select" name="category_id" required>
                  {{-- <option value="">---Select Category---</option> --}}
                @foreach ($category as $item)
                  <option value="{{$item->id}}" {{$post->categroy_id == $item->id ? 'selected':''}}>
                     {{$item->name}}
                  </option>
                @endforeach
                </select>
            </div>
            <div class="form-group my-2">
                <label for="frame">YT Iframe</label>
                <input type="text" name="yt_iframe" class="form-control" value="{{$post->yt_frame}}">
            </div>
            <div class="form-group my-4">
                <label for="inputDescription">Description</label>
                <textarea name="description" id="mysummernote" rows="4" class="form-control">{!! $post->description !!}</textarea>
            </div>
            <div class="h4">SEO Tags</div>
            <div class="form-group my-2">
                <label for="metaTitle">Meta title</label>
                <input type="text" name="metaTitle" class="form-control" value="{{$post->meta_title}}">
            </div>
            <div class="form-group my-2">
                <label for="metaDescription">Meta Description</label>
                <textarea name="metaDescription" rows="4" class="form-control">{!! $post->meta_description !!}</textarea>
            </div>
            <div class="form-group my-2">
                <label for="metaKeywords">Meta Keywords</label>
                <textarea name="metaKeywords" rows="4" class="form-control">{!! $post->meta_keywords !!}</textarea>
            </div>
            <div class="row">
                 <div class="form-group col">
                    <div class="form-check">
                    <input class="form-check-input" name="status" type="checkbox" {{$post->status == '1' ? 'checked': ''}}>
                    <label class="form-check-label" for="gridCheck">
                        Status
                    </label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
          </div>
        </div>
    </div>
@endsection