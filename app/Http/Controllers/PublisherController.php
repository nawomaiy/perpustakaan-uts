<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){
        // dd(Publisher::get());
        return view('publishers.index', [
            'publishers' => Publisher::latest()->get(),
        ]);
    }

    public function create(){
        return view('publishers.create');
    }

    public function store(Request $request){
        // return view('authors.create');
        // dd('sudah oke');
        $this->validate($request, [
            'name' => ['required'],
            'address' => ['required']
        ]);

        $publisher = new Publisher();

        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('publishers.index');
    }

    public function edit($id){
        // dd($id);
        $publisher = Publisher::find($id);

        return view('publishers.edit', [
            'publisher' => $publisher,
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => ['required'],
            'address' => ['required']
        ]);
        
        $publisher = Publisher::find($id);

        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->save();

        session()->flash('success', 'Data Berhasil Diupdate.');

        return redirect()->route('publishers.index');
    }

    public function destroy($id) {
        $publisher = Publisher::find($id);
        
        $publisher->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

    return redirect()->route('publishers.index');
    }
}

