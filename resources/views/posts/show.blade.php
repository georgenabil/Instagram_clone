@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-4">
                <div class="left">
                     <div class="d-flex align-items-center">
                         <div class="pr-3">
                             <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width:40px ">
                         </div>
                         <div>
                             <div class="font-weight-bold">
                                 <a class="text-dark" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a>
                                 <a href="#">  Follow</a>
                             </div>
                         </div>

                     </div>

                    <hr/>
                    <p><span class="font-weight-bold"><a class="text-dark" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a> </span> {{$post->caption}}</p>
                      @can('delete',$post)
                     <form action="/p/{{$post->id}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn">&#10060; Delete</button>
                      </form>
                       @endcan
                </div>
                
            </div>
        </div>


    </div>


@endsection
