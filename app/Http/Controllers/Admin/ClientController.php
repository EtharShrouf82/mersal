<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:clients', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_client', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_client', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_client', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::select('id', 'url', 'img', 'status', 'user_id', 'created_at')
            ->with('user:id,name')
            ->get();

        return view('Admin.Clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreRequest $request)
    {
        //        DB::beginTransaction();
        //        try {
        $client = new Client();
        $client->img = $request->input('vimg');
        $client->user_id = Auth::user()->id;
        $client->status = $request->input('status');
        $client->url = $request->input('url');
        $client->save();
        $client->translations()->create([
            'client_id' => $client->id,
            'title' => $request->input('title'),
            'locale' => LaravelLocalization::setLocale(),
        ]);
        DB::commit();

        return redirect(route('clients.index'))->with('success', 'تم إضافة العميل بنجاح');
        //        } catch (\Exception $e) {
        //            DB::rollback();
        //
        //            return redirect('/admin/slider')->with('error', 'لم تتم إضافة السلايدر ');
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
        $client = Client::findOrFail($id);

        return view('Admin.Clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        if ($request->input('vimg') != null) {
            $filepath = public_path().$client->img;
            if (file_exists($filepath)) {
                @unlink($filepath);
            }
            $client->img = $request->input('vimg');
        }
        $client->status = $request->status;
        $client->url = $request->url;
        $client->user_id = auth()->id();
        $client->save();
        $client->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'client_id' => $client->id,
                'title' => $request->input('title'),
                'locale' => LaravelLocalization::setLocale(),
            ]);

        return redirect(route('clients.index'))->with('success', 'تم تعديل العميل بنجاح');
    }

    public function updateStatus(Request $request)
    {
        $author = Client::findOrFail($request->id);
        $author->status = $request->status;
        $author->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        if ($client) {
            $filepath = public_path().$client->img;
            if (file_exists($filepath)) {
                @unlink($filepath);
            }

            return 1;
        }
    }
}
