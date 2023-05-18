<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:services', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_service', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_service', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_service', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::select('id', 'icon', 'status', 'user_id', 'created_at', 'follow')
            ->with('user:id,name')
            ->orderBy('id', 'DESC')
            ->get();

        return view('Admin.Services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceStoreRequest $request)
    {
        $product = new Service();
        $product->status = $request->status;
        $product->icon = $request->vimg;
        $product->follow = $request->follow;
        $product->user_id = auth()->id();
        $product->save();
        $product->translations()->create([
            'service_id' => $product->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'locale' => LaravelLocalization::setLocale(),
        ]);
        //        DB::commit();

        return redirect(route('service.index'))->with('success', 'تم إضافة الخدمة بنجاح');
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
        $service = Service::findOrFail($id);

        return view('Admin.Services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $service = Service::findOrFail($id);
            if ($request->input('vimg') != null) {
                $filepath = public_path().$service->icon;
                if (file_exists($filepath)) {
                    @unlink($filepath);
                }
                $service->icon = $request->input('vimg');
            }
            $service->user_id = Auth::user()->id;
            $service->status = $request->input('status');
            $service->follow = $request->input('follow');
            $service->save();
            $service->translations()->updateOrCreate(
                ['locale' => LaravelLocalization::setLocale()],
                [
                    'service_id' => $service->id,
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'locale' => LaravelLocalization::setLocale(),
                ]);
            DB::commit();

            return redirect(route('service.index'))->with('success', 'تم تعديل القسم بنجاح');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect(route('service.index'))->with('success', 'يوجد خطأ في تعديل القسم');
        }
    }

    public function updateStatus(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->status = $request->status;
        $service->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        if ($service) {
            $filepath = public_path().$service->img;
            if (file_exists($filepath)) {
                @unlink($filepath);
            }

            return 1;
        }
    }
}
