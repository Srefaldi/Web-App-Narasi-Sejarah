<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    public function index()
    {
        $items = Materi::all();
        return view('materi.index', [
            'materis' => $items
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('materi', 'public');

        Materi::create($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Materi::find($id);
        return view('materi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'images' => 'required',
            'text'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'nama'   => $request->nama,
            'images' => $request->images,
            'text'   => $request->text
        ];

        Materi::whereId($id)->update($data);
        return redirect()->route('index');
    }

    public function delete($id)
    {
        $data = Materi::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('index');
    }
}
