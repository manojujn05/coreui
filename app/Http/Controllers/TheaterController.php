<?php

namespace App\Http\Controllers;

use App\Theater;
use App\Merchant;
use App\TheaterMerchant;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TheaterController extends Controller
{
    public function index()
    {
        $theaters = Theater::select('*')
            ->paginate(20);
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

    public function search(Request $request)
    {
        $theaters = Theater::select('*')
            ->where(function ($query) use ($request) {
                if (!empty($request['option'])) {
                    $search = $request['q'];
                    if ($request['option'] == 'ID')
                        $query->where('id', '=', "$search");
                    elseif ($request['option'] == 'Name')
                        $query->where('name', 'LIKE', "%$search%");
                    elseif ($request['option'] == 'Type')
                        $query->where('type', 'LIKE', "%$search%");
                    elseif ($request['option'] == 'City')
                        $query->where('city', 'LIKE', "%$search%");;
                }
            })
            ->paginate(1);
        // dd($merchants);
        return view('theaters.list', compact('theaters'));
    }

    // Show list of all linked merchants
    public function merchant_theater()
    {
        $merchants = TheaterMerchant::join('theaters', 'theaters.id', '=', 'theater_id')
            ->join('packages', 'packages.id', '=', 'package_id')
            ->join('merchants', 'merchants.id', '=', 'merchant_id')
            ->select('merchant_theater.id', 'merchants.name as merchant', 'theaters.name as theater', 'packages.name as package', 'start_date', 'end_date', 'amount')
            ->paginate(20);
        return view('merchant_theater.list', compact('merchants'));
    }

    public function link_theater()
    {
        $merchants = Merchant::all();
        $packages = Package::all();
        $theaters = Theater::all();
        return view('merchant_theater.add', compact('merchants', 'packages', 'theaters'));
    }

    public function store_merchant_theater(Request $request)
    {
        TheaterMerchant::create([
            'theater_id' => $request['theater'],
            'merchant_id' => $request['merchant'],
            'package_id' => $request['package'],
            'start_date' => $request['sdate'],
            'end_date' => $request['edate'],
            'amount' => $request['amount'],
            'ad_duration' => $request['ad_duration'],
            'no_of_shows' => $request['no_of_shows']
        ]);
        return back()->with(['success' => 'Merchant account linked!']);
    }
}
