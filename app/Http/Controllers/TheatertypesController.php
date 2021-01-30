<?php

namespace App\Http\Controllers;

use App\Theatertype;
use Illuminate\Http\Request;
use DB;
class TheatertypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hello');
        $theaters = Theatertype::all();
        return view('theater_type.list', compact('theaters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Theatertype::create([
            'name'=>$request['theatertype']
        ]);
        return back()->with(['success' => 'Theater type record saved']);
    }



    public function update(Request $request)
    {
        $id = $request['id'];
        $theatertype = Theatertype::Findorfail($id);
        $theatertype->name = $request['theatertype'];
        $theatertype->save();
        return back()->with(['success' => 'Theater type record saved']);
    }

    public function delete($id)
    {
        DB::delete('delete from theatertype where id = ?', [$id]);
        return back()->with(['success' => 'Theater type record deleted]']);
    }
}
