@extends('layouts.app')

@section('title', 'masuk')

@section('content')
<div class="auth-container">
    <div class="form-card w-full">

        <div class="auth-icon-warp">
            <div class="auth-icon">🔑</div>
            <h2 class="form-title mb-0">Masuk ke website pepustakaan</h2>
            <p class="auth-title">Selamat datang!</p>
        </div>
   
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
        <form action="{{ route('login') }}" method="POST" class="auth-form">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="contoh@email.com" required >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-remember">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-primary auth-btn">Masuk</button>
        </form>

        <div class="form-footer mt-1-5">
            belum punya akun? <a href="{{ route('register') }}" class="form-link">Daftar sekarang</a>
        </div>
    </div>
</div>
@endsection 