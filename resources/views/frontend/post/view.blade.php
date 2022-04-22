@extends('layouts.app')

@section('title',"$post->meta_title")
@section('description',"$post->meta_description")
@section('keywords',"$post->meta_keywords")

@section('content')
    <div class="container py-5">
        <div class="row">
          <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header border-0 rounded-0 fw-bold">
                    <h5 class="text-uppercase">{!!$post->name!!}</h5>
                </div>
            </div>

            <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-2">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('tutorial/'.$post->category->name)}}">{{$post->category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!!$post->name!!}</li>
            </ol>
            </nav>

            <div class="card rounded-0 my-4">
                <div class="card-header bg-white border-0 rounded-0">
                    <h1 class="text-uppercase h5">{!!$post->name!!}</h1>
                    <span>{!!$post->category->name!!}</span>
                </div>
                <div class="card-body">
                  <p>{!!$post->description!!}</p>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <h6 class="text-center border p-3">Advertisment</h6>
            <h6 class="text-center border p-3">Advertisment</h6>
            <h6 class="text-center border p-3">Advertisment</h6>
            <h6 class="text-center border p-3">Advertisment</h6>
            <h6 class="text-center border p-3">Advertisment</h6>

            <div class="card rounded-0">
                <div class="card-header border-0 rounded-0 fw-bold">
                    <h5 class="text-uppercase">Latest Post</h5>
                </div>
                <div class="card-body">
                    @foreach ($latestPost as $latestPostItem)
                        <a href="{{url('tutorial/'.$latestPostItem->category->slug.'/'.$latestPostItem->slug)}}">
                        <h6>{{$latestPostItem->name}}</h6>
                        </a>
                    @endforeach
                </div>
            </div>
          </div>
        </div>
     </div>
@endsection