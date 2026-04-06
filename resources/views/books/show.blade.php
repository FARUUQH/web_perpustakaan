@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="mb-1-5">
        <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali ke Daftar Buku</a>
    </div>

    <div class="book-detail">
        <div class="">
            @if ($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }} cover"
                    class="detail-cover">
            @else
                <div class="detail-cover-placeholder">
                    <span class="icon">📖</span>
                   
                </div>
            @endif
        </div>

        <div class="detail-info">
            <h1>{{ $book->title }}</h1>
            <div class="detail-author">Oleh: {{ $book->author }}</div>

            @if ($book->description)
                <div class="detail-description">
                    <p><strong>Deskripsi:</strong></p>
                    <p>{{ $book->description }}</p>
                </div>
            @else
                <div class="detail-desc.state-text">
                    <span class="icon">ℹ️</span>
                    <span>Deskripsi tidak tersedia</span>
                </div>

            @endif

            <div class="detail-uploader"></strong>
                diupload pada <strong>{{ $book->user->name}}</strong>
            </div>

            @auth
                @if ($book->user_id === Auth::id())
                <div class="action-button-lg">
                    <a href="{{ route('my-books.edit', $book) }}" class="btn btn-secondary">✏️Edit</a>
                    <form action="{{ route('my-books.destroy', $book) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');" class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">🗑️Hapus</button>
                    </form>
                </div>
                    
                @endif
            @endauth
        </div>
    </div>
@endsection
