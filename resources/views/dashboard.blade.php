@extends('layouts.app')

@section('header', '')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                	<h1 class="display-4"><b>Dashboard of {{ auth()->user()->name }}</b></h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th colspan="1">ID</th>
                                <th>Title</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $posts->render() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
