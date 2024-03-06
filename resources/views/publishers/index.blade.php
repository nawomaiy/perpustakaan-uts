@extends('templates.default')

{{-- @php
    $title = 'Data Perpusatakaan'
    $preTitle = 'Publisher'
@endphp --}}

@push('page-action')
    <a href="{{ route('publishers.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<h1>Publisher</h1>

<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($publishers as $publisher)
          <tr>
            <td>{{ $publisher->name }}</td>
            <td>{{ $publisher->address }}</td>
            <td>
              <a href="{{ route('publishers.edit', $publisher->id) }}">Edit</a>
              <form action="{{ route('publishers.destroy', $publisher->id) }}" method="post">
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