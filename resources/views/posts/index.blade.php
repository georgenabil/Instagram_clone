@extends('layouts.app')


@section('content')
<div class="container">


    @foreach($posts as $post)
        <div class="row">
            <div class="col-8 offset-2 pt-4 ">
                <a href="/profile/{{$post->user->id}}" >
                <img src="/storage/{{$post->image}}" class="w-100">
                </a>
            </div>
        </div>

            <div class="row">
               <div class="col-8 offset-2 pt-4">
                   <div class="left">
                       <div class="d-flex align-items-center">
                           <div class="pr-3">
                               <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width:40px ">
                           </div>
                           <div>
                               <div class="font-weight-bold">
                                   <a class="text-dark" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a>
                                   <p class="font-weight-bold"> {{$post->caption}}</p>

                               </div>
                           </div>

                       </div>

                   </div>

            </div>
        </div>
    @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">{{ $posts->links() }}</div>
        </div>

        @if($posts->isEmpty())
            <h3 class="text-center">Suggested Users </h3>
            <div class="d-flex flex-sm-wrap ">
            @foreach($allusers as $SugUser)
             <div class="card" style="width: 15rem; margin: 15px;">
                <img class="card-img-top rounded-circle w-85" src="{{$SugUser->profile->profileImage() }}" alt="Card image cap ">
                <div class="card-body">
                    <h5 class="card-title">{{$SugUser->username}}</h5>
                    <a href="/profile/{{$SugUser->id}}" class="btn btn-primary btn-block">follow</a>

                </div>
            </div>
                @endforeach
           </div>

        @endif



</div>


@endsection
