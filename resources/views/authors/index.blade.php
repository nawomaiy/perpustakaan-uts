@extends('templates.default')

{{-- @php
    $title = 'Data Perpusatakaan'
    $preTitle = 'Authors'
@endphp --}}

@push('page-action')
    <a href="{{ route('authors.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<h1>Authors</h1>
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Photo</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <td>{{ $author->name }}</td>
                <td><img src="{{ asset('storage/' . $author->photo) }}" alt="" height="100px"></td>
                <td><a href="{{ route('authors.edit', $author->id) }}">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                      </form>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection