<nav class="navbar navbar-expand-lg navbar-dark bg-red">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="{{url('/')}}">CodeNatwork</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
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

      </ul>
    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
           <a href="{{url('login')}}" class="nav-link text-uppercase fw-bold border-0">Login</a>
        </li>
        <li class="nav-item">
           <a href="{{url('register')}}" class="nav-link text-uppercase fw-bold border-0">Register</a>
        </li>
    </ul>
  </div>
</nav>