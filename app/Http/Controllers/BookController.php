<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(){
        // dd(Book::get());
        
        return view('books.index', [
            'books' => Book::latest()->get(),
            // 'search' => Book::latest()->get()
        ]);

        // $search = $request['search'] ?? "";
        // if ($search != ""){
        //     // where
        //     $books = Book::where('title', '=', $search)->get();
        // }else{
        //     $books = Book::all();
        // }
        
    }

    public function create(){
        return view('books.create', [
            'authors' => Authors::get(),
        ]);
    }

    public function store(Request $request){
        // return view('authors.create');
        // dd('sudah oke');
        $this->validate($request, [
            'authors' => ['required'],
            'title' => ['required'],
            'cover' => ['image'],
            'year' => ['required', 'numeric']
        ]);

        // dd($request->cover);

        $cover = null;
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('photos');
        }

        $book = new Book();

        $book->author_id = $request->authors;
        $book->title = $request->title;
        $book->cover = $cover;
        $book->year = $request->year;
        $book->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('books.index');
    }

    public function edit($id){
        // dd($id);
        $book = Book::find($id);

        return view('books.edit', [
            'book' => $book,
            'authors' => Authors::get()
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'authors' => ['required'],
            'title' => ['required'],
            'cover' => ['image'],
            'year' => ['required', 'numeric']
        ]);
        
        $book = Book::find($id);

        $cover = null;
        if ($request->hasFile('cover')) {
            if (Storage::exists($book->cover)) {
                Storage::delete($book->cover);
            }

            $cover = $request->file('cover')->store('photos');
        }
            
        
        $book->author_id = $request->authors;
        $book->title = $request->title;
        $book->cover = $cover;
        $book->year = $request->year;
        $book->save();

        session()->flash('success', 'Data Berhasil Diupdate.');

        return redirect()->route('books.index');
    }

    public function destroy($id) {
        $book = Book::find($id);
        
        $book->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

    return redirect()->route('books.index');
    }

    public function search(Request $request)
        {
            $search_text = $_GET['search'];
            $books = Book::where('title', 'like', '%' .$search_text. '%')->get();
            return view('books.index', compact('books' ?? 'not found'));
            // if (request('search')) {
            //     $books = Book::where('title', 'like', '%' . request('search') . '%')->get();
            // } else {
            //     // return redirect()->route('books.index');
            // }
        
            // return view('books.index')->with('books', $books);
        }

}