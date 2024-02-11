@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Book</div>

                <div class="card-body">
                    @if ($errors->any())
                    <ul class="list-group">
                        @foreach ($errors->all() as $field_name => $error)
                        <li class="list-item alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('books') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

