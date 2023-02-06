@extends('layouts.app')

@section('title') index @endsection

@section('content')

    <div class="text-center">
        <!-- rout is a global method contain the anchored page path's shortcut -->
        <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                {{-- <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['posted_by']}}</td>
                <td>{{$post['created_at']}}</td> --}}
                <td>{{$post->id}}</td>  {{-- this is better because -> is the sign of the object's attribute, and (post) is realy an object not an array, and (posts) is a collection of objects not an assoc. array --}}
                <td>{{$post->title}}</td>
                <td>{{$post->user->name ?? 'Not Found'}}</td>  {{-- We can use other syntaxes like if condition --}}
                <td>{{$post->created_at}}</td>
                <td>
                    {{-- <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a> --}}
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a>
                    <span class="btn btn-danger">
                        <form method="POST" action="{{route('posts.destroy', $post->id)}}">
                            @csrf
                            @method('DELETE')
                            <a>
                                Delete
                            </a>
                        </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

{{ $posts->links() }}

@endsection
