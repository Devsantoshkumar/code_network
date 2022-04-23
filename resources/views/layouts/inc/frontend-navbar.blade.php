{{-- advertisement area start --}}
<div class="container-fluid">
   <div class="container">
       <h5 class="text-center p-3 border m-2">Advertisement</h5>
   </div>
</div>
{{-- advertisement area end --}}
@php
    $setting = App\Models\Setting::find(1);
@endphp
<div class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-red">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="{{url('/')}}">{{$setting->logo}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
        <li class="nav-item">
          <a class="nav-link text-uppercase" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> --}}
        @php
            $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
        @endphp

        @foreach ($categories as $cateItem)
            <li class="nav-item">
               <a class="nav-link text-uppercase" href="{{url('tutorial/'.$cateItem->slug)}}">{{$cateItem->name}}</a>
            </li>
        @endforeach
       <li class="nav-item ms-md-auto d-flex">
            @if (Auth::check())
            <a href="{{route('logout')}}" class="nav-link text-uppercase fw-bold border-0" onclick="event.preventDefault(); document.getElementById('front-logout-form').submit();">Logout</a>
            @else
            <a href="{{url('register')}}" class="nav-link text-uppercase fw-bold border-0">Register</a>
            <a href="{{url('login')}}" class="nav-link text-uppercase fw-bold border-0">Login</a>
            @endif
          <form id="front-logout-form" action="{{route('logout')}}" method="POST" class="d-none">
            @csrf
          </form>
          
       </li>
      </ul>
    </div>
  </div>
</nav>
</div>