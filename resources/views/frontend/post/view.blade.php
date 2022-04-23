@extends('layouts.app')

@section('title',"$post->meta_title")
@section('description',"$post->meta_description")
@section('keywords',"$post->meta_keywords")

@section('content')
    <div class="container pt-5">
        <div class="row">
          <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header border-0 rounded-0 fw-bold">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb my-2">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('tutorial/'.$post->category->name)}}">{{$post->category->name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{!!$post->name!!}</li>
                        </ol>
                        </nav>
                </div>
            </div>

            

            <div class="card rounded-0 mt-4">
                <div class="card-header bg-white border-0 rounded-0">
                    <h1 class="text-uppercase h4">{!!$post->name!!}</h1>
                    <span class="text-muted fw-bold postShotDesc">Category: {!!$post->category->name!!} |</span>
                    <span class="text-muted fw-bold postShotDesc">Posted By: {!!$post->user->name!!} |</span>
                    <span class="text-muted fw-bold postShotDesc">Posted On: {!!$post->user->created_at->format('d-m-Y')!!} |</span>
                </div>
                <div class="card-body">
                  <p>{!!$post->description!!}</p>
                </div>
            </div>

            {{-- comment section start --}}
            <div class="card my-3 rounded-0">

                @if (session('massage'))
                    <div class="alert alert-warning mb-3">{{session('massage')}}</div>
                @endif   

                <form action="{{url('comments')}}" method="POST">
                     @csrf
                     <div class="form-group p-2">
                         <input type="hidden" name="post_slug" value="{{$post->slug}}">
                        <label for="comment" class="fw-bold text-muted">Drop comment</label>
                        <textarea name="comment" class="form-control" rows="3" id="comment" placeholder="........."></textarea>
                      </div>
                      <button type="submit" class="btn btn-sm btn-primary m-2">Sumbit</button>
                </form>
                @forelse ($post->comments as $commentItem)
                    <div class="card border-0 commentContainer">
                        <div class="card-header border-danger border-top rounded-0">
                        <span class="commentShorts text-muted">Name: 
                            @if ($commentItem->user)
                                {{$commentItem->user->name}}
                            @endif
                        </span> |
                        <span class="commentShorts text-muted">Commented On: {{$commentItem->created_at->format('d-m-Y')}}</span>
                        </div>
                        <div class="card-body">

                        <p class="card-text mainComment">
                            {!!$commentItem->comment_body!!}
                        </p>
                        </div>
                        @if (Auth::check() && Auth::id() == $commentItem->user_id)
                            <button type="button" value="{{$commentItem->id}}" data-token="{{ csrf_token() }}" class="text-danger px-3 me-auto outline-none border-0 bg-transparent deleteComment"><i class="fas fa-trash"></i></button>
                            {{-- <a href="#" class="text-success px-2"><i class="fas fa-edit"></i></a> --}}
                        @endif
                    </div>
                  @empty
                  <div class="h6 p-2">No comments Yet.</div>
              @endforelse
            </div>
            {{-- comment section end --}}

          </div>
          <div class="col-md-4">
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


@section('script')
    <script>
        $(document).ready(function(){
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $(document).on('click','.deleteComment',function(){
                  if(confirm("Are you sure you want to delete comment"))
                  {
                      var thisClicked = $(this);
                      var commentId = thisClicked.val();

                    //   var data = {
                    //         _token:$(this).data('token'),
                    //         comment_id: 'testdatacontent'
                    //     }
                        
                      $.ajax({
                          type: 'POST',
                          url: "/delete-comment",
                          data: {'comment_id': commentId},
                          success: function(res){
                              if(res.status == 200){
                                  thisClicked.closest('.commentContainer').remove();
                              }else{
                                alert(res.message);
                              }
                          }
                      })
                  }
            })
        })
    </script>
@endsection