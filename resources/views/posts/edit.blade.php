@extends('layouts.app')

@section('title') edit @endsection

@section('content')

    <form method="POST" action="{{route('posts.index')}}">
      @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea
                class="form-control"
            ></textarea>
        </div>
        <div class="mb-3">
            <label class="form-check-label">Post Creator</label>

            <select class="form-control">
                <option>Ahmed</option>
                <option>Mohamed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection