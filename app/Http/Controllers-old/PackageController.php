<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index()
    {
        $theaters = Package::all();
        return view('packages.list', compact('theaters'));
    }

    public function store(Request $request)
    {
        Package::create([
            'name' => $request['package'],
            'price' => $request['price']
        ]);
        return back()->with(['success' => 'Package record saved']);
        //
    }

    public function update(Request $request)
    {
        $id = $request['theater_id'];
        $package = Package::Findorfail($id);
        $package->name = $request['package'];
        $package->price = $request['price'];
        $package->save();
        return back()->with(['success' => 'Package record saved']);
    }



    public function delete($id)
    {

        DB::delete('delete from packages where id = ?', [$id]);
        return back()->with(['success' => 'Package record deleted']);
    }
}
