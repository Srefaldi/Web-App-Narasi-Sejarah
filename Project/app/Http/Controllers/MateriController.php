<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    public function index()
    {
        $items  = Materi::all();
        return view('materi.index', [
            'items' => $items
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('materi', 'public');
        Materi::create($data);
        session()->flash('success', 'Artikel Berhasil Ditambahkan');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $materi = Materi::find($id);
        if ($materi->image) {
            Storage::delete('public/' . $materi->image);
        }
        $materi->delete();
        session()->flash('success', 'Artikel berhasil dihapus.');
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $materi = Materi::find($id);
        $validasiData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|max:1024',
            'description' => 'required',
        ]);

        $file = $request->file('image');
        if ($file) {
            if ($materi->image) {
                Storage::delete('public/' . $materi->image);
            }
            $filename = 'materi/' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/', $filename);
            $validasiData['image'] = $filename;
        }

        $materi->update($validasiData);
        session()->flash('success', 'Artikel berhasil diupdate.');
        return redirect()->back();
    }
    public function readmore($id)
    {
        $item = Materi::find($id); 

        return view('materi.readmore', compact('item'));
    }
}
