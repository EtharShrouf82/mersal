<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:sliders', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_slider', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_slider', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_slider', ['only' => ['destroy']]);
    }

    public function index()
    {
        $slider = Slider::select('id', 'img', 'status')
            ->orderBy('id', 'DESC')->paginate(20);

        return view('Admin.Slider.index', compact('slider'));
    }

    public function create()
    {
        return view('Admin.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        DB::beginTransaction();
        //        try {
        $slider = new Slider();
        $slider->img = $request->input('vimg');
        $slider->user_id = Auth::user()->id;
        $slider->status = $request->input('status');
        $slider->link = $request->input('link');
        $slider->save();
        $slider->translations()->create([
            'slider_id' => $slider->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'button_title' => $request->input('button_title'),
            'locale' => LaravelLocalization::setLocale(),
        ]);
        DB::commit();

        return redirect('/admin/slider')->with('success', 'تم إضافة السلايدر بنجاح');
        //        } catch (\Exception $e) {
        //            DB::rollback();
        //
        //            return redirect('/admin/slider')->with('error', 'لم تتم إضافة السلايدر ');
        //        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('Admin.Slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $slider = Slider::findOrFail($id);
            if ($request->input('vimg') != null) {
                $filepath = public_path().$slider->img;
                if (file_exists($filepath)) {
                    @unlink($filepath);
                }
                $slider->img = $request->input('vimg');
            }
            $slider->img = $request->input('vimg');
            $slider->user_id = Auth::user()->id;
            $slider->status = $request->input('status');
            $slider->link = $request->input('link');
            $slider->save();
            $slider->translations()->updateOrCreate(
                ['locale' => LaravelLocalization::setLocale()],
                [
                    'slider_id' => $slider->id,
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'button_title' => $request->input('button_title'),
                    'locale' => LaravelLocalization::setLocale(),
                ]);
            DB::commit();

            return redirect('/admin/slider')->with('success', 'تم تعديل  السلايدر  بنجاح');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/admin/slider')->with('error', 'لم يتم تعديل السلايدر ');
        }
    }

    public function updateStatus(Request $request)
    {
        $author = Slider::findOrFail($request->id);
        $author->status = $request->status;
        $author->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        if ($slider) {
            $filepath = public_path().$slider->img;
            if (file_exists($filepath)) {
                @unlink($filepath);
            }

            return 1;
        }
    }
}
