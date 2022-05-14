<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Match1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        $match = Match1::orderBy('id', 'desc')->get();
        $title = 'Match';
        return view('cms.match.index', compact('title', 'match'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            // return response()->json($request->all(), 200);
            $validator = Validator::make($request->all(), [
                'team1' => 'required|max:255',
                'team2' => 'required|max:255',
                'time_start' => 'required|max:255',
                // 'time_end' => 'nullable|max:255',
                'team1_image' => 'nullable|image',
                'team2_image' => 'nullable|image',
                'result' => 'nullable|in:0,1,2,3',
                'is_active' => 'nullable|in:0,1',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->all()[0]], 500);
            }

            $match = new Match1();
            $match->team1 = $request->team1;
            $match->team2 = $request->team2;
            $match->time_start = $request->time_start;
            // $match->time_end = $request->time_end;
            if ($request->hasFile('team1_image')) {
                $match->team1_image = @Storage::url($request->file('team1_image')->store('public/image'));
            }
            if ($request->hasFile('team2_image')) {
                $match->team2_image = @Storage::url($request->file('team2_image')->store('public/image'));
            }

            $match->result = $request->result;
            $match->is_active = $request->is_active;

            $match->save();

            return response()->json([], 200);
        }

        $title = 'Match';
        return view('cms.match.add', compact('title'));
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            // return response()->json($request->all(), 200);
            $validator = Validator::make($request->all(), [
                'team1' => 'required|max:255',
                'team2' => 'required|max:255',
                'time_start' => 'required|max:255',
                // 'time_end' => 'nullable|max:255',
                'team1_image' => 'nullable|image',
                'team2_image' => 'nullable|image',
                'result' => 'nullable|in:0,1,2,3',
                'is_active' => 'nullable|in:0,1',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->all()[0]], 500);
            }

            $match =  Match1::find($request->id);
            $match->team1 = $request->team1;
            $match->team2 = $request->team2;
            $match->time_start = $request->time_start;
            // $match->time_end = $request->time_end;
            if ($request->hasFile('team1_image')) {
                $match->team1_image = @Storage::url($request->file('team1_image')->store('public/image'));
            }
            if ($request->hasFile('team2_image')) {
                $match->team2_image = @Storage::url($request->file('team2_image')->store('public/image'));
            }

            $match->result = $request->result;
            $match->is_active = $request->is_active;

            $match->save();

            return response()->json([], 200);
        }

        $match =  Match1::find($request->id);
        $title = 'Match';
        return view('cms.match.edit', compact('title', 'match'));
    }

    public function delete(Request $request)
    {
        $match = Match1::find($request->id);
        $match->delete();
        return response()->json([], 200);
    }
}
