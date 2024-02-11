@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Book</div>

                <div class="card-body">
                    @if ($errors->any())
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                        <li class="list-item alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
