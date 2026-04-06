@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<div class="auth-container">
    <div class="form-card w-full">

        <div class="auth-icon-warp">
            <div class="auth-icon">⭐</div>
            <h2 class="form-title mb-0">Buat Akun Baru</h2>
            <p class="auth-subtitle">gabung dengan komunitas kami!</p>
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
        <form action="{{ route('register') }}" method="POST" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
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
             <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi password Anda" required>
            </div>
            </div>

            <div class="auth-remember">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-primary auth-btn">Masuk</button>
        </form>

        <div class="form-footer mt-1-5">
            sudah punya akun? <a href="{{ route('login') }}" class="form-link">Masuk sekarang</a>
        </div>
    </div>
</div>
@endsection 