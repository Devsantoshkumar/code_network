@extends('layouts.app')

@section('title',"$category->meta_title")
@section('description',"$category->meta_description")
@section('keywords',"$category->meta_keyword")
  
@section('content')
    <div class="container py-5">
        <div class="row">
          <div class="col-8">
            <div class="card rounded-0">
                <div class="card-header border-0 rounded-0 fw-bold">
                    <h5 class="text-uppercase">{{$category->name}}</h5>
                </div>
            </div>

            @forelse ($post as $postItems)
                <div class="card rounded-0 border-0 shadow-sm my-3">
                <div class="card-body">
                    <a href="{{url('tutorial/'.$category->slug.'/'.$postItems->slug)}}" class="text-decoration-none fw-bold d-block">{{$postItems->name}}</a>
                    <span class="postTime text-muted">Posted At: {{$postItems->created_at->format('d-m-Y')}}</span>
                    <span class="postTime mx-3 text-muted">Created By: {{$postItems->user->name}}</span>
                </div>
                </div>
            @empty
                <div class="card rounded-0 border-0 shadow-sm my-3">
                <div class="card-body">
                    <a href="#" class="text-decoration-none fw-bold d-block">Post not available</a>
                </div>
              </div>
            @endforelse

            {{-- paggination --}}
                <nav>
                   {{$post->links()}}
                </nav>


          </div>
          <div class="col-4">
            <h6 class="text-center border p-3">Advertisment</h6>
          </div>
        </div>
     </div>
@endsection