<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Plan;
use App\Models\Screen;
use App\Models\ScreenImage;
use App\Models\ScreenType;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $screens=Screen::select('id','citie_id','screen_type_id','position','status','user_id','created_at')
            ->with('user:id,name')
            ->with('city:id')
            ->with('screen_type:id')
            ->latest()
            ->paginate(30);
        return view('Admin.Screens.index', compact('screens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city=City::select('id')->get();
        $screenType=ScreenType::select('id')->get();
        return view('Admin.Screens.create', compact('screenType','city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $screen = new Screen();
        $screen->citie_id = $request->city_id;
        $screen->screen_type_id = $request->screen_type_id;
        $screen->position = 1;
        $screen->status = $request->status;
        $screen->user_id = auth()->id();
        $screen->save();
        $screen->translations()->create([
            'screen_id' => $screen->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'locale' => LaravelLocalization::setLocale(),
        ]);

        if ($request->oimg) {
            $imgs = [];
            foreach ($request->oimg as $value) {
                $imgs[] = [
                    'screen_id' => $screen->id,
                    'img' => $value,
                ];
            }
            ScreenImage::insert($imgs);
        }

        //        DB::commit();

        return redirect(route('screens.index'))->with('success', 'تم إضافة الخدمة بنجاح');
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
        $city=City::select('id')->get();
        $screenType=ScreenType::select('id')->get();
        $screen=Screen::with('images')->findOrFail($id);
        return view('Admin.Screens.edit', compact('screenType','city','screen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $screen=Screen::findOrFail($id);
        $screen->citie_id = $request->city_id;
        $screen->screen_type_id = $request->screen_type_id;
        $screen->position = 1;
        $screen->status = $request->status;
        $screen->user_id = auth()->id();
        $screen->save();
        $screen->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'screen_type_id' => $screen->id,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'locale' => LaravelLocalization::setLocale(),
            ]);

        if ($request->oimg) {
            $imgs = [];
            foreach ($request->oimg as $value) {
                $imgs[] = [
                    'screen_id' => $screen->id,
                    'img' => $value,
                ];
            }
            ScreenImage::insert($imgs);
        }

        //        DB::commit();

        return redirect(route('screens.index'))->with('success', 'تم تعديل الخدمة بنجاح');
    }

    public function updateStatus(Request $request)
    {
        $screen = Screen::findOrFail($request->id);
        $screen->status = $request->status;
        $screen->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $screen = Screen::findOrFail($id);
        if($screen->delete()){
            return 1;
        }
    }
}
