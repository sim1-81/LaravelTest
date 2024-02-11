@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $book->title }}</div>

                    <div class="card-body">
                        <p>Author: {{ $book->author }}</p>
                        <p>Created At: {{ $book->created_at }}</p>
                        <p>Updated At: {{ $book->updated_at }}</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
