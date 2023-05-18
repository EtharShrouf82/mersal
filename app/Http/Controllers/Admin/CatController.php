<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CatController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:cats', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_cat', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_cat', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_cat', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Cat::select('id', 'status', 'user_id', 'created_at')
            ->with('user:id,name')
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return view('Admin.Cat.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Cat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //        DB::beginTransaction();
        //        try {
        $cat = new Cat();
        $cat->img = $request->input('vimg');
        $cat->user_id = Auth::user()->id;
        $cat->status = $request->input('status');
        $cat->save();
        $cat->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'cat_id' => $cat->id,
                'title' => $request->input('title'),
                'description' => $request->input('cat_description'),
                'locale' => LaravelLocalization::setLocale(),
            ]);
        DB::commit();

        return redirect(route('cats.index'))->with('success', 'تم إضافة القسم بنجاح');
        //        } catch (\Exception $e) {
        //            DB::rollback();
        //            return redirect(route('cats.index'))->with('error', 'لم تتم إضافة القسم ');
        //        }
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
        $cat = Cat::findOrFail($id);

        return view('Admin.Cat.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $cat = Cat::findOrFail($id);
            $cat->user_id = Auth::user()->id;
            $cat->status = $request->input('status');
            $cat->save();
            $cat->translations()->updateOrCreate(
                ['locale' => LaravelLocalization::setLocale()],
                [
                    'cat_id' => $cat->id,
                    'title' => $request->input('title'),
                    'description' => $request->input('cat_description'),
                    'locale' => LaravelLocalization::setLocale(),
                ]);
            DB::commit();

            return redirect(route('cats.index'))->with('success', 'تم تعديل القسم بنجاح');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect(route('cats.index'))->with('success', 'يوجد خطأ في تعديل القسم');
        }
    }

    public function updateStatus(Request $request)
    {
        $author = Cat::findOrFail($request->id);
        $author->status = $request->status;
        $author->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Cat::findOrFail($id);
        $cat->delete();

        return 1;
    }
}
