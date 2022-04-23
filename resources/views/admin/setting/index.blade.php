@extends('layouts.master')

@section('title','Dashboard')
    

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Settings</li>
        </ol>
        @if (session('massage'))
                <div class="alert alert-success">{{session('massage')}}</div>
            @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-muted">Website settings</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/settings')}}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="from-group">
                                 <label for="webName">Website name</label>
                                 <input type="text" name="webName" @if($setting) value="{{$setting->website_name}}" @endif class="form-control my-2" />
                             </div>
                             <div class="from-group">
                                <label for="logo">Logo</label>
                                <input type="text" name="logo" @if($setting) value="{{$setting->logo}}" @endif class="form-control my-2" />
                            </div>
                            <div class="from-group">
                                <label for="favicon">Favicon</label>
                                <input type="file" name="favicon" class="form-control my-2" />
                            </div>
                            <div class="from-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control my-2">@if($setting) {{$setting->description}} @endif</textarea>
                            </div>
                            <div class="from-group">
                                <label for="metaTitle">Meta Title</label>
                                <input type="text" name="metaTitle" @if($setting) value="{{$setting->meta_title}}" @endif class="form-control my-2" />
                            </div>
                            <div class="from-group">
                                <label for="metaDescription">Meta Description</label>
                                <textarea name="metaDescription" id="metaDescription" rows="4" class="form-control my-2">@if($setting) {{$setting->meta_description}} @endif</textarea>
                            </div>
                            <div class="from-group">
                                <label for="metaKeyword">Meta Keyword</label>
                                <textarea name="metaKeyword" id="metaKeyword" rows="4" class="form-control my-2">@if($setting) {{$setting->meta_keyword}} @endif</textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection