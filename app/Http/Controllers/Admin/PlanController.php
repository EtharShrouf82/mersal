<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\ScreenType;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::select('id','status','num_views','user_id','created_at','screen_type_id')
            ->with('screen_type:id')
            ->with('user:id,name')
            ->latest()
            ->get();
        return view('Admin.Plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $screenTypes=ScreenType::select('id')->get();
        return view('Admin.Plans.create', compact('screenTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $screen = new Plan();
        $screen->screen_type_id = $request->screen_type_id;
        $screen->num_views = $request->num_views;
        $screen->status = $request->status;
        $screen->user_id = auth()->id();
        $screen->save();
        $screen->translations()->create([
            'screen_id' => $screen->id,
            'title' => $request->input('title'),
            'locale' => LaravelLocalization::setLocale(),
        ]);
        return redirect(route('plans.index'))->with('success', 'تم إضافة الخدمة بنجاح');

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
        $plan=Plan::findOrFail($id);
        return view('Admin.Plans.edit', compact('screenTypes','plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $screen=Plan::findOrFail($id);
        $screen->screen_type_id = $request->screen_type_id;
        $screen->num_views = $request->num_views;
        $screen->status = $request->status;
        $screen->user_id = auth()->id();
        $screen->save();
        $screen->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'screen_type_id' => $screen->id,
                'title' => $request->input('title'),
                'locale' => LaravelLocalization::setLocale(),
            ]);
        return redirect(route('plans.index'))->with('success', 'تم تعديل الخدمة بنجاح');
    }

    public function updateStatus(Request $request)
    {
        $screen = Plan::findOrFail($request->id);
        $screen->status = $request->status;
        $screen->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $screen = Plan::findOrFail($id);
        if($screen->delete()){
            return 1;
        }
    }
}
