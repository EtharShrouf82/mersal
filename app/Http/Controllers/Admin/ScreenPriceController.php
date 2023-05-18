<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceStoreRequest;
use App\Models\Plan;
use App\Models\ScreenPrice;
use App\Models\ScreenType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ScreenPriceController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:prices', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_price', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_price', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_price', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $screenType = ScreenType::select('id')->get();
        $plans = Plan::select('id')->get();
        $prices = ScreenPrice::select('id', 'screen_type_id', 'plan_id', 'price', 'discount', 'user_id', 'status', 'created_at')
            ->with('user:id,name')
            ->with('screen_type:id')
            ->with('plan:id')
            ->when(\request('screen_type_id'), function ($q) {
                $q->where('screen_type_id', \request('screen_type_id'));
            })->when(\request('plan_id'), function ($q) {
                $q->where('plan_id', \request('plan_id'));
            })
            ->orderBy('screen_type_id', 'ASC')
            ->get();
        return view('Admin.Prices.index', compact('prices', 'plans', 'screenType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $screenTypes=ScreenType::select('id')->get();
        return view('Admin.Prices.create', compact('screenTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PriceStoreRequest $request)
    {
        $price = new ScreenPrice();
        $price->screen_type_id = $request->screen_type_id;
        $price->plan_id = $request->plan_id;
        $price->price = $request->price;
        $price->discount = $request->discount;
        $price->status = $request->status;
        $price->user_id = Auth::user()->id;
        $price->save();
        $price->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'screen_price_id' => $price->id,
                'title' => $request->input('title'),
                'locale' => LaravelLocalization::setLocale(),
            ]);
        return redirect(route('prices.index'))->with('success','تم إضافة السعر بنجاح');
//        DB::commit();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $screenTypes=ScreenType::select('id')->get();
        $price=ScreenPrice::findOrFail($id);
        $plans=Plan::select('id')->where('screen_type_id',$price->screen_type_id)->get();
        return view('Admin.Prices.edit', compact('screenTypes','price','plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $price = ScreenPrice::findOrFail($id);
        $price->screen_type_id = $request->screen_type_id;
        $price->plan_id = $request->plan_id;
        $price->price = $request->price;
        $price->discount = $request->discount;
        $price->status = $request->status;
        $price->user_id = Auth::user()->id;
        $price->save();
        $price->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'screen_price_id' => $price->id,
                'title' => $request->input('title'),
                'locale' => LaravelLocalization::setLocale(),
            ]);
        return redirect(route('prices.index'))->with('success','تم تعديل السعر بنجاح');
    }

    public function updateStatus(Request $request)
    {
        $author = ScreenPrice::findOrFail($request->id);
        $author->status = $request->status;
        $author->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = ScreenPrice::findOrFail($id);
        if($author->delete()){
            return 1;
        }
    }
}
