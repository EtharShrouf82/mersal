<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mechanism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MechanismController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:mechanism', ['only' => ['index']]);
        $this->middleware('permission:add_mechanism', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_mechanism', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_mechanism', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mechanism = Mechanism::with('user:id,name')->get();

        return view('Admin.Mechanism.index', compact('mechanism'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Mechanism.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mechanism = new Mechanism();
        $mechanism->user_id = Auth::user()->id;
        $mechanism->status = $request->input('status');
        $mechanism->save();
        $mechanism->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'mechanism_id' => $mechanism->id,
                'title' => $request->input('title'),
                'locale' => LaravelLocalization::setLocale(),
            ]);
        DB::commit();

        return redirect(route('mechanism.index'))->with('success', 'تم إضافة الألية بنجاح');
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
        $mechanism = Mechanism::findOrFail($id);

        return view('Admin.Mechanism.edit', compact('mechanism'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $mechanism = Mechanism::findOrFail($id);
            $mechanism->user_id = Auth::user()->id;
            $mechanism->status = $request->input('status');
            $mechanism->save();
            $mechanism->translations()->updateOrCreate(
                ['locale' => LaravelLocalization::setLocale()],
                [
                    'mechanism_id' => $mechanism->id,
                    'title' => $request->input('title'),
                    'locale' => LaravelLocalization::setLocale(),
                ]);
            DB::commit();

            return redirect(route('mechanism.index'))->with('success', 'تم تعديل الألية بنجاح');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect(route('mechanism.index'))->with('success', 'يوجد خطأ في الألية القسم');
        }
    }

    public function updateStatus(Request $request)
    {
        $mechanism = Mechanism::findOrFail($request->id);
        $mechanism->status = $request->status;
        $mechanism->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mechanism = Mechanism::findOrFail($id);
        $mechanism->delete();

        return 1;
    }
}
