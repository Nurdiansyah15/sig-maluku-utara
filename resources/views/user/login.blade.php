@extends('layout.main')
@section('content')
    <main class="form-signin w-50">
        <form action="/login" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Masuk sebagai Administrator</h1>
            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ old('email') }}">
                <label for="email">Alamat Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" value="{{ old('password') }}">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>
@endsection
