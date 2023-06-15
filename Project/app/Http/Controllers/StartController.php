<?php

namespace App\Http\Controllers;
use App\Models\KuisModel;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index(){
        return view ('kuis.index');
    }

    public function startkuis(){
        $item = KuisModel::all();
        return view('kuis/start', ['items' => $item]);
    }

    public function store_leaderboard(Request $request)
    {
        $data = $request->all();
        Leaderboard::create($data);
        return view('layout/quis');
    }

    public function viewleaderboard()
    {
        $items = Leaderboard::orderBy('skor', 'desc')->simplePaginate(7);
        return view('kuis.leaderboard', ['items' => $items]);
    }


    public function exportPDF()
    {
        $data = DB::table("leaderboards")
            ->orderBy('skor', 'desc')
            ->get();

        $pdf = PDF::loadView('export', compact('data'));
        return $pdf->download('data_leaderboard.pdf');
    }
}
