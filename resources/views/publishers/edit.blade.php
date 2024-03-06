@extends('templates.default')

@php
    $title = 'Edit Data';
    $preTitle = '';
@endphp

@section('content')
<h1>Publisher</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('publishers.update', $publisher->id) }}" class="" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name')
                is-invalid
            @enderror" name="example-text-input" placeholder="text your name" value="{{ old('name') ?? $publisher->name }}">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control @error('address')
                is-invalid
            @enderror" name="example-text-input" placeholder="text your address" value="{{ old('address') ?? $publisher->address }}">
            @error('address')
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