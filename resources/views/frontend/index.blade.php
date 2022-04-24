@extends('layouts.app')

@section('title',"cpdingnetwork")
@section('description',"this is programming language")
@section('keywords',"html, css ,js")

@section('content')
    <div class="bg-light pt-5 pb-3 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme category-carousel">
                    @foreach ($all_category as $all_category_item)
                        <div class="item">
                           <a href="{{url('tutorial/'.$all_category_item->slug)}}" class="text-decoration-none text-muted">
                           <div class="card shadow-sm slideCard">
                              <img src="{{asset('uploads/category/'.$all_category_item->image)}}" height="150px" alt="" />
                              <div class="card-body">
                                <h6>{{$all_category_item->name}}</h6>
                              </div>
                           </div>
                           </a>
                        </div>
                    @endforeach
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4 py-3">
            <div class="col"><h5 class="px-2"><span class="border-bottom border-danger py-1 border-5">Programming Resources</span></h5></div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-3 px-4 py-2">
                <div class="card shadow-sm bg-light rounded-0">
                    <div class="card-body">
                      <h6 class="card-title">Source Code</h6>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, dolorum?</p>
                      <a href="{{url('resourse/index')}}" class="card-link text-decoration-none">Donwload</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm-3 px-4 py-2">
                <div class="card shadow-sm bg-light rounded-0">
                    <div class="card-body">
                      <h6 class="card-title">Templates</h6>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, dolorum?</p>
                      <a href="{{url('resourse/index')}}" class="card-link text-decoration-none">Donwload</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm-3 px-4 py-2">
                <div class="card shadow-sm bg-light rounded-0">
                    <div class="card-body">
                      <h6 class="card-title">Video Tutorial</h6>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, dolorum?</p>
                      <a href="{{url('resourse/index')}}" class="card-link text-decoration-none">Watch</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm-3 px-4 py-2">
                <div class="card shadow-sm bg-light rounded-0">
                    <div class="card-body">
                      <h6 class="card-title">Notes</h6>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, dolorum?</p>
                      <a href="{{url('resourse/index')}}" class="card-link text-decoration-none">Donwload</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    {{-- advertisement area start --}}
    <div class="container-fluid p-0 py-4 mt-5 bg-light border">
            <h5 class="text-center p-5">Advertisement</h5>
    </div>
    {{-- advertisement area end --}}

    <div class="container">
        <div class="row mt-4 py-3">
            <div class="col"><h5 class="px-2"><span class="border-bottom border-success py-1 border-5">Categories</span></h5></div>
        </div>
        <div class="row mt-2">
                @foreach ($all_category as $all_category_item)
                <div class="col-sm-3 px-4 py-2">
                   <a href="{{url('tutorial/'.$all_category_item->slug)}}" class="card-link text-decoration-none">
                    <div class="card myCardCate shadow-sm bg-light rounded-0">
                        <div class="card-body">
                          {{$all_category_item->name}}
                        </div>
                      </div>
                    </a>
                </div>
                @endforeach
        </div>
    </div>

    <div class="container-fluid pb-5 bg-light">
        <div class="container">
        <div class="row mt-4 py-3">
            <div class="col"><h5 class="px-2"><span class="border-bottom border-success py-1 border-5">Latest Post</span></h5></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-8 py-1">
                @foreach ($latest_post as $latest_post_item)
                   <a href="{{url('tutorial/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="card-link text-decoration-none m-0 latestPostLinks">
                    <div class="card bg-light rounded-0">
                        <div class="card-body p-0 p-2">
                          {{$latest_post_item->name}}
                        </div>
                      </div>
                    </a>
                @endforeach
            </div>
                <div class="col-md-4 my-1">
                    <h5 class="text-center border py-4">Advertisement</h5>
                </div>
        </div>
    </div>
</div>
@endsection