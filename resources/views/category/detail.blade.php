@extends('layouts.master')

@section('content')
    <div class="container paddding">
        <h1 class="my-3 text-primary">{{ $categories->name }}</h1>

        <div class="row">
            @forelse ($categories->news as $item)
                <div class="col-4">
                    <div class="card px-2 py-2">
                        <img src="{{ asset('/uploads/' . $item->thumbnail) }}" class="card-img-top" width="100%" height="200px" alt="{{ $item->title }}">

                        <div class="card-body">
                            <h1>{{ $item->title }}</h1>

                            <p class="card-text">{{ Str::limit($item->content, 100) }}</p>

                            <small>{{ $item->created_at->diffForHumans() }}</small>

                            <a href="{{ route('news.detail', $item->id) }}" class="btn btn-primary btn-block">lihat</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h3>Tidak Ada Berita di Kategori Ini</h3>
                </div>
            @endforelse
        </div>

        <a href="{{ route('home') }}" class="btn btn-secondary btn-block my-5">halaman utama</a>
    </div>
@endsection