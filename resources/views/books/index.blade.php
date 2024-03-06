@extends('templates.default')

{{-- @php
    $title = 'Data Perpusatakaan'
    $preTitle = 'Books'
@endphp --}}

@push('page-action')
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<h1>Book</h1>

{{-- @extends('books.search') --}}

{{-- <label for="exampleDataList" class="form-label">Datalist example</label> --}}
<form action="{{ url('/search') }}" type="get">
  <input type="search" class="form-control" name="search" placeholder="Type to search...">
  {{-- <button class="btn btn-primary" type="submit">Search</button> --}}
</form>


{{-- <div class="search">
  <div class="row ">
    <form action="">
      <div class="form-group">
        <input type="search" class="form-control" placeholder="Find books here" name="search" value="{{ $search }}">
        <button class="btn btn-primary">Search</button>
      </div> --}}
      
      
      {{-- <input
      type="search"
      class="form-control"
      placeholder="Find books here"
      name="search"
      value="{{ request('search') }}"
  > --}}
  {{-- </form>
  </div> --}}
  

{{-- <ul class="list-group mt-3">
  @forelse($books as $book)
      <li class="list-group-item">{{ $book->title }}</li>
  @empty
      <li class="list-group-item list-group-item-danger">Book Not Found.</li>
  @endforelse
</ul> --}}
{{-- </div> --}}


<div class="card">
 </form>
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Author</th>
            <th>Title</th>
            <th>Cover</th>
            <th>Year</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($books as $book)
          <tr>
            <td>{{ $book->author->name }}</td>
            <td>{{ $book->title }}</td>
            <td><img src="{{ asset('storage/' . $book->cover) }}" alt="" height="150px"></td>
            
            <td>{{ $book->year }}</td>
            <td>
              <a href="{{ route('books.edit', $book->id) }}">Edit</a>
              <form action="{{ route('books.destroy', $book->id) }}" method="post">
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