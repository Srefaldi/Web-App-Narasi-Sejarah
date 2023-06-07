<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    // menampilkan data
    public function dashboard()
    {
        return view('dashboard');
    }

    public function index()
    {
        $data = User::get();
        return view('index', compact('data'));
    }


    // insert data
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'nama'      => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails())  return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'email'     => $request->email,
            'name'      => $request->nama,
            'password'  => Hash::make($request->password)
        ];

        User::create($data);

        return redirect()->route('user.index');
    }

    // edit data
    public function edit(Request $request, $id)
    {
        $data = User::find($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'nama'      => 'required',
            'password'  => 'nullable',
            'level'     => 'required'
        ]);

        if ($validator->fails())  return redirect()->back()->withInput()->withErrors($validator);

        $data['email'] = $request->email;
        $data['name'] = $request->nama;
        $data['level'] = $request->level;

        // ...

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->route('user.index');
    }

    public function delete(Request $request, $id)
    {
        $data = User::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('user.index');
    }
}
