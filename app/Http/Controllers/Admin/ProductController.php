<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Cat;
use App\Models\Product;
use App\Models\ProductImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:products', ['only' => ['index']]);
        $this->middleware('permission:add_product', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_product', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Cat::select('id')->get();
        $products = Product::select('id', 'status', 'price', 'user_id', 'views', 'created_at', 'img')
            ->with('user:id,name')
            ->with(['cats' => function ($q) {
                $q->select('id')->with(['translations' => function ($q) {
                    $q->select('cat_id', 'title')->where('locale', LaravelLocalization::setLocale());
                }]);
            }])
            ->when(\request('title'), function ($q) {
                $q->withWhereHas('translations', function ($q) {
                    $q->where('title', 'LIKE', '%'.\request('title').'%');
                });
            })->when(\request('cat_id'), function ($q) {
                $q->where('cat_id', \request('cat_id'));
            })->when(\request('status'), function ($q) {
                $q->where('status', \request('status'));
            })
            ->orderBy('id', 'DESC')->paginate(20);

        return view('Admin.Product.index', compact('products', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Cat::select('id')
            ->with(['translations' => function ($q) {
                $q->select('cat_id', 'title')->where('locale', LaravelLocalization::setLocale());
            }])
            ->orderBy('id', 'DESC')->get();

        return view('Admin.Product.create', compact('cats'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        //        DB::beginTransaction();
        //        try {
        $product = new Product();
        $product->status = $request->status;
        $product->price = $request->price;
        $product->price_hidden = $request->price_hidden;
        $product->img = $request->vimg;
        $product->user_id = auth()->id();
        $product->save();
        $product->translations()->create([
            'product_id' => $product->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'locale' => LaravelLocalization::setLocale(),
        ]);

        $product->cats()->attach($request->cat_id);

        if ($request->oimg) {
            $imgs = [];
            foreach ($request->oimg as $value) {
                $imgs[] = [
                    'product_id' => $product->id,
                    'img' => $value,
                ];
            }
            ProductImg::insert($imgs);
        }

        DB::commit();

        return redirect(route('products.index'))->with('success', 'تم إضافة المنتج بنجاح');
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
        $cats = Cat::select('id')
            ->with(['translations' => function ($q) {
                $q->select('cat_id', 'title')->where('locale', LaravelLocalization::setLocale());
            }])->orderBy('id', 'DESC')->get();
        $product = Product::with(['cats' => function ($q) {
            $q->select('id')->with('titleTranslation');
        }])
            ->with('images:id,product_id,img')
            ->findOrFail($id);

        return view('Admin.Product.edit', compact('cats', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = Product::findOrFail($id);
        if ($request->input('vimg') != null) {
            $filepath = public_path().$product->img;
            if (file_exists($filepath)) {
                @unlink($filepath);
            }
            $product->img = $request->input('vimg');
        }

        $product->status = $request->status;
        $product->price = $request->price;
        $product->price_hidden = $request->price_hidden;
        $product->user_id = auth()->id();
        $product->save();
        $product->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'product_id' => $product->id,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'locale' => LaravelLocalization::setLocale(),
            ]);

        $product->cats()->sync($request->cat_id);

        if ($request->oimg) {
            $imgs = [];
            foreach ($request->oimg as $value) {
                $imgs[] = [
                    'product_id' => $product->id,
                    'img' => $value,
                ];
            }
            ProductImg::insert($imgs);
        }

        return redirect(route('products.index'))->with('success', 'تم تعديل المنتج بنجاح');
    }

    public function updateStatus(Request $request)
    {
        $author = Product::findOrFail($request->id);
        $author->status = $request->status;
        $author->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Product::findOrFail($id);
        if ($author->delete()) {
            return 1;
        }

    }

    public function removeProductImage($id)
    {
        $productImage = ProductImg::findOrFail($id);
        if ($productImage) {
            $filepath = public_path().'/images/products/'.$productImage->img;
            if (file_exists($filepath)) {
                @unlink($filepath);
            }
        }
        if ($productImage->delete()) {
            return 1;
        }
    }
}
