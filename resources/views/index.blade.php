@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Books</div>

                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Create New Book</a>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('books.destroy') }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="id" value="{{ $book->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
