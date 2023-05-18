<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:about_us_subjects', ['only' => ['index']]);
        $this->middleware('permission:add_about_us_subjects', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_about_us_subjects', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_about_us_subjects', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = AboutSubject::with('user:id,name')->get();

        return view('Admin.About.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.About.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $about = new AboutSubject();
        $about->icon = $request->input('icon');
        $about->user_id = Auth::user()->id;
        $about->status = $request->input('status');
        $about->save();
        $about->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'about_subject_id' => $about->id,
                'title' => $request->input('title'),
                'description' => $request->input('cat_description'),
                'locale' => LaravelLocalization::setLocale(),
            ]);
        DB::commit();

        return redirect(route('about_us.index'))->with('success', 'تم إضافة الموضوع بنجاح');
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
        $about = AboutSubject::findOrFail($id);

        return view('Admin.About.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $about = AboutSubject::findOrFail($id);
            $about->user_id = Auth::user()->id;
            $about->status = $request->input('status');
            $about->icon = $request->input('icon');
            $about->save();
            $about->translations()->updateOrCreate(
                ['locale' => LaravelLocalization::setLocale()],
                [
                    'about_subject_id' => $about->id,
                    'title' => $request->input('title'),
                    'description' => $request->input('cat_description'),
                    'locale' => LaravelLocalization::setLocale(),
                ]);
            DB::commit();

            return redirect(route('about_us.index'))->with('success', 'تم تعديل الموضوع بنجاح');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect(route('about_us.index'))->with('success', 'يوجد خطأ في تعديل الموضوع');
        }
    }

    public function updateStatus(Request $request)
    {
        $about = AboutSubject::findOrFail($request->id);
        $about->status = $request->status;
        $about->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = AboutSubject::findOrFail($id);
        $about->delete();

        return 1;
    }
}
