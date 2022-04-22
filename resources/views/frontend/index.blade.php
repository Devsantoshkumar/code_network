@extends('layouts.app')

@section('title',"CodeNetwork")
@section('description',"code network is a programming plateform")
@section('keywords',"html, css, javascript")

@section('content')
    <div class="bg-light py-5 border-bottom">
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
@endsection