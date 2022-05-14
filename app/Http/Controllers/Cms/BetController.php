<?php

namespace App\Http\Controllers\Cms;

use App\Exports\BetExport;
use App\Http\Controllers\Controller;
use App\Models\Bet;
use App\Models\Match1;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\DB;

class BetController extends Controller
{
    public function index(Request $request)
    {
        $match = request()->get('match', null);
        $result = request()->get('result', null);
        $bet = Bet::with('match')
        ->where(function ($q) use ($match) {
            if (isset($match)) {
                $q->where('match_id', $match);
            }
        })
        ->where(function ($q) use ($result) {
            if (isset($result)) {
                $q->where('result', $result);
            }
        })
        ->orderBy('id', 'desc')
        ->get();
        $match = Match1::all();

        $title = 'Bet';
        return view('cms.bet.index', compact('title', 'bet', 'match'));
    }

    public function export(Request $request)
    {
        // dd($request->all());
        $match = request()->get('match', null);
        $result = request()->get('result', null);
        // $bet = Bet::with('match')->whereHas('match', function ($q) {
        //     $q->whereColumn('result', 'bets.result');
        // })->get();
        $bet = Bet::with('match')
            ->where(function ($q) use ($match) {
                if (isset($match)) {
                    $q->where('match_id', $match);
                }
            })
            ->where(function ($q) use ($result) {
                if (isset($result)) {
                    $q->where('result', $result);
                }
            })
            ->orderBy('id', 'desc')
            ->get();
        return Excel::download(new BetExport($bet), 'customers.xlsx');
    }

    // public function exportLucky(Request $request)
    // {
    //     $bet = Bet::with('match')->whereHas('match', function ($q) {
    //         $q->whereColumn('result', 'bets.result');
    //     })->where('is_lucky', 1)->get();
    //     return Excel::download(new BetExport($bet), 'customers-lucky.xlsx');
    // }
}
