@extends('layouts.app')

@section('title') show @endsection

@section('content')


  <div class="card border-grey m-5">
    <div class="card-header">POST INFO</div>
    <div class="card-body text-dark">
      <span class="card-title"><strong>Title :-</strong></span>
      <span class="card-text">{{$post->title}}</span>
      <h6 class="card-title mt-3">Description :-</h6>
      <p class="card-text">{{$post->description}}</p>
    </div>
  </div>

  <div class="card border-grey m-5">
    <div class="card-header">POST CREATOR INFO</div>
    <div class="card-body text-dark">
      <span class="card-title"><strong>Name :-</strong></span>
      <span class="card-text">{{$post->user->name ?? 'Not Found'}}</span><br>
      <span class="card-title mt-3"><strong>Email :-</strong></span>
      <span class="card-text">{{$post->user->email ?? 'Not Found'}}</span><br>
      <span class="card-title mt-3"><strong>Created At :-</strong></span>
      <span class="card-text">{{$post->created_at ?? 'Not Found'}}</span>
    </div>
  </div>

@endsection