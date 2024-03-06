@extends('templates.default')

@php
    $title = 'Tambah Data';
    $preTitle = '';
@endphp

@section('content')
<h1>Authors</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('authors.store') }}" class="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name')
                    is-invalid
                @enderror" placeholder="text your name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control @error('photo')
                is-invalid
            @enderror" placeholder="Input placeholder" value="{{ old('photo') }}">
            @error('photo')
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