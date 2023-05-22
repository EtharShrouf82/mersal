<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs=JobApply::select('id','job_id','city_id','name','email','phone','gender','cv','status','user_id','is_replayed','created_at')
            ->with('city:id')
            ->with('job:id')
            ->with('user:id')
            ->get();

        return view('Admin.JobsApply.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job=JobApply::with('city:id')
            ->with('job:id')
            ->with('user:id')
            ->findOrFail($id);
        return view('Admin.JobsApply.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job=JobApply::findOrFail($id);
        $job->user_note=$request->user_notes;
        $job->is_replayed=1;
        $job->user_id = auth()->id();
        $job->save();
        return redirect(route('jobs_apply.index'))->with('success','تم إضافة الملاحظة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
