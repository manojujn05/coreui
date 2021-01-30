<?php

namespace App\Http\Controllers;

use App\Merchant;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MerchantsController extends Controller
{
    public function index()
    {
        $merchants = Merchant::select('*')
            ->paginate(20);
        return view('merchants.list', compact('merchants'));
    }
    public function store(Request $request)
    {
        Merchant::create([
            'name' => $request['merchant'],
            'business_type' => $request['business_type'],
            'mobile' => $request['mobile'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state']
        ]);
        return back()->with(['success' => 'Merchant record saved']);
    }

    public function update(Request $request)
    {
        $id = $request['merchant_id'];
        $theater = Merchant::Findorfail($id);
        $theater->name = $request['merchant'];
        $theater->business_type = $request['business_type'];
        $theater->mobile = $request['mobile'];
        $theater->address = $request['address'];
        $theater->city = $request['city'];
        $theater->state = $request['state'];
        $theater->save();
        return back()->with(['success' => 'Theater record saved']);
    }

    public function delete($id)
    {
        DB::delete('delete from merchants where id = ?', [$id]);
        return back()->with(['success' => 'Merchant record deleted]']);
    }

    public function search(Request $request)
    {
        $merchants = Merchant::select('*')
            ->where(function ($query) use ($request) {
                if (!empty($request['option'])) {
                    $search = $request['q'];
                    if ($request['option'] == 'ID')
                        $query->where('id', '=', "$search");
                    elseif ($request['option'] == 'Name')
                        $query->where('name', 'LIKE', "%$search%");
                    elseif ($request['option'] == 'Mobile')
                        $query->where('mobile', 'LIKE', "%$search%");;
                }
            })
            ->paginate(1);
        // dd($merchants);
        return view('merchants.list', compact('merchants'));
    }
}
