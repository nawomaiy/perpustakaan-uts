@extends('templates.default')

@php
    $title = 'Tambah Data';
    $preTitle = '';
@endphp

@section('content')
<h1>Book</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.store') }}" class="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Author</label>
                <select name="authors" id="" class="form-control">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            @error('authors')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control  @error('title')
                is-invalid
            @enderror" name="example-text-input" placeholder="text the books title" value="{{ old('title') }}">
            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type="file" name="cover" class="form-control  @error('cover')
                is-invalid
            @enderror" placeholder="text the books cover" value="{{ old('cover') }}">
            @error('cover')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="text" name="year" class="form-control  @error('year')
                is-invalid
            @enderror" name="example-text-input" placeholder="text what year the books made" value="{{ old('year') }}">
            @error('year')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
              </div>

              <div class="mb-3">
                <input type="submit" value="save" class="btn btn-primary">
              </div>
        </form>
    </div>
</div>

@endsection