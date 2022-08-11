<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function index(Request $request)
    {
        $products = $this->product->latest()->where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('description', 'LIKE', "%{$request->search}%")
            ->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $dataCreate = $request->all();
        $dataCreate['size'] = implode(',', $request->size);
        // $dataCreate['image'] = $this->product->saveImage($request);

        $product = $this->product->create($dataCreate);

        if ($request->has('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/imgs'), $imageName);
                $product->images()->create([
                    'url' => $imageName,
                    'imageable_id' => $new_product->id,

                ]);
            }
        }
        // foreach ($request->file('image') as $image) {
        //     $product->images()->create(['url' => $dataCreate['image']]);
        // }

        $product->categories()->attach($dataCreate['category_ids']);

        return to_route('products.index')->with(['message' => 'create success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = $this->category->all();
        $product = $this->product->findOrFail($id);
        return view('admin.products.show', compact('categories', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->all();
        $product = $this->product->findOrFail($id);
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $dataUpdate = $request->all();
        $product =  $this->product->findOrFail($id)->load('categories');
        $dataUpdate['size'] = implode(',', $request->size);
        $currentImage =  $product->images->count() > 0 ? $product->images->first()->url : '';
        $dataUpdate['image'] = $this->product->updateImage($request, $currentImage);

        $product->update($dataUpdate);
        $product->images()->delete();
        $product->images()->create(['url' => $dataUpdate['image']]);
        $product->categories()->sync($dataUpdate['category_ids'] ?? []);
        return to_route('products.index')->with(['message' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  $this->product->findOrFail($id)->load('categories');
        $product->images()->delete();
        $imageName =  $product->images->count() > 0 ? $product->images->first()->url : '';
        $this->product->deleteImage($imageName);
        $product->delete();

        return redirect()->route('products.index')->with(['message' => 'Delete success']);
    }
}
