<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:jobs', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_job', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_job', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_job', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs=Job::select('id','img','end_date','status','num_views','user_id','created_at')
            ->with('user:id,name')
            ->latest()
            ->get();
        return view('Admin.Jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->end_date = $request->end_date;
        $job->img = $request->vimg;
        $job->status = $request->status;
        $job->user_id = auth()->id();
        $job->save();
        $job->translations()->create([
            'job_id' => $job->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'locale' => LaravelLocalization::setLocale(),
        ]);
        return redirect(route('jobs.index'))->with('success','تم إضافة الوظيفة بنجاح');
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
        $job=Job::findOrFail($id);
        return view('Admin.Jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job=Job::findOrFail($id);
        if ($request->input('vimg') != null) {
            $filepath = public_path().$job->img;
            if (file_exists($filepath)) {
                @unlink($filepath);
            }
            $job->img = $request->input('vimg');
        }
        $job->end_date = $request->end_date;
        $job->status = $request->status;
        $job->user_id = auth()->id();
        $job->save();
        $job->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'job_id' => $job->id,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'locale' => LaravelLocalization::setLocale(),
            ]);
        return redirect(route('jobs.index'))->with('success','تم تعديل الوظيفة بنجاح');

    }

    public function updateStatus(Request $request)
    {
        $service = Job::findOrFail($request->id);
        $service->status = $request->status;
        $service->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        if ($job) {
            $filepath = public_path().$job->img;
            if (file_exists($filepath)) {
                @unlink($filepath);
            }

            return 1;
        }
    }
}
