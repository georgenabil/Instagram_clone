@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-3">
                <img src="/imgs/profile.jpg" class="rounded-circle" style="width:200px; ">
            </div>

            <div class="col-9">

                       <div class="d-flex justify-content-between align-items-lg-baseline">
                           <h1>{{ $user->username }}</h1>
                           <a href="/p">Add new Post </a>
                       </div>
                       <div class="d-flex">
                         <div class="pr-5"><strong>15</strong> posts</div>
                         <div class="pr-5"><strong>275k</strong> followers</div>
                         <div class="pr-5"><strong>198</strong> following</div>
                       </div>

                       <div class="pt-4 font-weight-bold">{{$user->profile->title}} </div>
                       <div> {{ $user->profile->description }} </div>
            </div>

    </div>


    <div class="row pt-5">
                <div class="col-4">
                    <img src="/imgs/profile.jpg" class="w-100">
                </div>
                <div class="col-4">
                    <img src="/imgs/profile.jpg" class="w-100">
                </div>
                <div class="col-4">
                    <img src="/imgs/profile.jpg" class="w-100">
                </div>

      </div>


 </div>
@endsection
