@extends('layouts.master')

@section('content')

    <div class="main-content mt-5">
        <div class="card text-bg-info p-3">
            <div class="card-header">
                All Posts
                <a class="btn btn-success" href="{{route('posts.create')}}">Create</a>
                <a class="btn btn-warning" href="{{route('posts.trashed')}}">Trashed</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 10%">Image</th>
                        <th scope="col" style="width: 20%">Title</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 10%">Language</th>
                        <th scope="col" style="width: 10%">Creation Date</th>
                        <th scope="col" style="width: 20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>
                                <img src="{{asset($post->image)}}" width="60" alt="Picture not found">
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{date('c-m-Y', strtotime($post->created_at))}}</td>
                            <td>
                                <a class="btn-sm btn-success btn" href="{{route('posts.show',$post->id)}}">Show</a>
                                <a class="btn-sm btn-primary btn" href="{{route('posts.edit',$post->id)}}">Edit</a>
{{--                                <a class="btn-sm btn-danger btn" href="{{route('posts.destroy',$post->id)}}">Delete</a>--}}
                                <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="m-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-sm btn-danger btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
