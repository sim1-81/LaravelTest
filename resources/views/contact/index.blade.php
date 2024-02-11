@extends('../layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contact</div>

                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form action="{{ route('contact.create') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="example@email.com"  value="">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="text">Message</label>
                            <textarea class="form-control" name="text" id="text" placeholder="Your message here..."></textarea>
                            @error('text')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
