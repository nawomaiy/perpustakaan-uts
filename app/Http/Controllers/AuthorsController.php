<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PharIo\Manifest\Author;

class AuthorsController extends Controller
{
    public function index (){
        return view('authors.index', [
            'authors' => Authors::latest()->get(),
        ]);
    }

    public function create(){
        return view('authors.create');
    }

    public function store(Request $request){
        // return view('authors.create');
        // dd('sudah oke');
        // dd($request->photo);
        $this->validate($request, [
            'name' => ['required'],
            'photo' => ['image']
        ]);

        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }


        $authors = new Authors();

        $authors->name = $request->name;
        $authors->photo = $photo;
        $authors->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('authors.index');
    }

    public function edit($id){
        // dd($id);
        $authors = Authors::find($id);

        return view('authors.edit', [
            'authors' => $authors,
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => ['required'],
            'photo' => ['image']
        ]);

        $authors = Authors::find($id);

        $photo = null;
        if ($request->hasFile('photo')) {
            if (Storage::exists($authors->photo)) {
                Storage::delete($authors->photo);
            }
            $photo = $request->file('photo')->store('photos');
        }

        $authors->name = $request->name;
        $authors->photo = $photo;
        $authors->save();

        session()->flash('success', 'Data Berhasil Diupdate.');

        return redirect()->route('authors.index');
    }

    public function destroy($id) {
        $authors = Authors::find($id);

        $authors->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

    return redirect()->route('authors.index');
    }
}

