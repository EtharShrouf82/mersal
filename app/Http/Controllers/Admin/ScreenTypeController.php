<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScreenType;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ScreenTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:screen_type', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_screen_type', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_screen_type', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_screen_type', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $screenTypes = ScreenType::select('id','status','created_at','user_id')->with('user:id,name')->get();
        return view('Admin.ScreenTypes.index', compact('screenTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.ScreenTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $screenType = new ScreenType();
        $screenType->status = $request->status;
        $screenType->user_id = auth()->id();
        $screenType->save();
        $screenType->translations()->create([
            'screen_type_id' => $screenType->id,
            'title' => $request->input('title'),
            'locale' => LaravelLocalization::setLocale(),
        ]);
        //        DB::commit();

        return redirect(route('screen_type.index'))->with('success', 'تم إضافة الخدمة بنجاح');
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
        $screenType = ScreenType::findOrFail($id);
        return view('Admin.ScreenTypes.edit', compact('screenType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $screenType = ScreenType::findOrFail($id);
        $screenType->status = $request->status;
        $screenType->user_id = auth()->id();
        $screenType->save();
        $screenType->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'screen_type_id' => $screenType->id,
                'title' => $request->input('title'),
                'locale' => LaravelLocalization::setLocale(),
            ]);
        return redirect(route('screen_type.index'))->with('success', 'تم تعديل الخدمة بنجاح');

    }

    public function updateStatus(Request $request)
    {
        $service = ScreenType::findOrFail($request->id);
        $service->status = $request->status;
        $service->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = ScreenType::findOrFail($id);
        if($service->delete()){
            return 1;
        }
    }
}
