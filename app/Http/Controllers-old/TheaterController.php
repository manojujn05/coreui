<?php

namespace App\Http\Controllers;

use App\Theater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TheaterController extends Controller
{
    public function index()
    {
        $theaters = Theater::all();
        return view('theaters.list', compact('theaters'));
    }
    public function store(Request $request)
    {
        Theater::create([
            'name' => $request['theater'],
            'type' => $request['type'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state']
        ]);
        return back()->with(['success' => 'Theater record saved']);
        //
    }

    public function update(Request $request)
    {
        $id = $request['theater_id'];
        $theater = Theater::Findorfail($id);
        $theater->name = $request['theater'];
        $theater->type = $request['type'];
        $theater->address = $request['address'];
        $theater->city = $request['city'];
        $theater->state = $request['state'];
        $theater->save();
        return back()->with(['success' => 'Theater record saved']);
    }



    public function delete($id)
    {
        DB::delete('delete from theaters where id = ?', [$id]);
        return back()->with(['success' => 'Theater record deleted]']);
    }
}
