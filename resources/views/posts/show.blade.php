@extends('layouts.app')

@section('title') show @endsection

@section('content')


  <div class="card border-grey m-5">
    <div class="card-header">POST INFO</div>
    <div class="card-body text-dark">
      <span class="card-title"><strong>Title :-</strong></span>
      <span class="card-text">Definition for the term.</span>
      <h6 class="card-title mt-3">Description :-</h6>
      <p class="card-text">Definition for the term.</p>
    </div>
  </div>

  <div class="card border-grey m-5">
    <div class="card-header">POST CREATOR INFO</div>
    <div class="card-body text-dark">
      <span class="card-title"><strong>Name :-</strong></span>
      <span class="card-text">Yara</span><br>
      <span class="card-title mt-3"><strong>Email :-</strong></span>
      <span class="card-text">yara@tara.com</span><br>
      <span class="card-title mt-3"><strong>Created At :-</strong></span>
      <span class="card-text">Yara</span>
    </div>
  </div>

@endsection