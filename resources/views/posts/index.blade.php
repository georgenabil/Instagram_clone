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

</div>


@endsection
