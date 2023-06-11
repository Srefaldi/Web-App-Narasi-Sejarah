<?php

namespace App\Http\Controllers;

use App\Models\KuisModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\quiz;

class KuisController extends Controller
{
    public function index()
    {
        $items = quiz::all();
        return view('kuis.index', [
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        quiz::create($data);
        session()->flash('success', 'Soal Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $kuis = quiz::find($id);
        $kuis->delete();
        session()->flash('success', 'Kuis berhasil dihapus.');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $kuis = quiz::find($id);
        $validasiData = $request->validate([
            'soal' => 'required|max:255',
            'option_a' => 'required|max:255',
            'option_b' => 'required|max:255',
            'option_c' => 'required|max:255',
            'option_d' => 'required|max:255',
            'Jawaban' => 'required|max:255'
        ]);


        $kuis->update($validasiData);
        session()->flash('success', 'Soal berhasil diupdate.');
        return redirect()->back();
    }
}
