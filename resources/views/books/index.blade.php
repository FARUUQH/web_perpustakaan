@extends('layouts.app')
@section('title', 'beranda')

@section('content')
    <div class="hero">
        <h1>Selamat Datang di Web Perpustakaan</h1>
        <p>Temukan berbagai buku menarik di perpustakaan digital kami!</p>
        <form action="{{ route('books.index') }}"class="hero-search" method="GET">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="cari judul atau pengarang">
            <button type="submit">Cari</button>
        </form>

    </div>

    <div class="page-header-row">
        <div class="page-header">
            <h1>Daftar Buku</h1>
            <p>Jumlah buku: {{ $books->total() }}</p>
        </div>
        @auth
            <a href="{{ route('my-books.create') }}" class="btn btn-primary">Tambah Buku</a>
        @endauth
    </div>
    <div class="books-grid">
        @foreach ($books as $book)
            <div class="book-card">
                <a href="{{ route('books.show', $book) }}" class="book-link">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }} cover"
                            class="book-cover">
                    @else
                    <div class="book-cover-placeholder">
                        <span class="icon">📖</span>
                        <span>No Cover</span>
                    </div>
                    @endif
                    <div class="book-info">
                        <div class="book-title">{{ $book->title }}</div>
                        <div class="book-author">Oleh: {{ $book->author }}</div>
                    </div>
                </a>

            </div>
        @endforeach
    </div>

    
 
@endsection
