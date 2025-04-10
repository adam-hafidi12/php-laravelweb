<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($search = $request->search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($min_price = $request->min_price) {
            $query->where('price', '>=', $min_price);
        }

        if ($max_price = $request->max_price) {
            $query->where('price', '<=', $max_price);
        }

        if ($min_stock = $request->min_stock) {
            $query->where('stock', '>=', $min_stock);
        }

        if ($max_stock = $request->max_stock) {
            $query->where('stock', '<=', $max_stock);
        }

        $products = $query->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Display a listing of the products (custom list).
     */
    public function productslist()
    {
        $products = Product::latest()->paginate(5);
        return view('products.productslist', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'detail' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'company_id' => 'nullable|integer',
    ]);

    $input = $request->all();
    if ($image = $request->file('image')) {
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move(public_path($destinationPath), $profileImage);
        $input['image'] = $profileImage;
    }

    Product::create($input);
    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'detail' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'company_id' => 'nullable|integer',
    ]);

    $input = $request->all();
    if ($image = $request->file('image')) {
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move(public_path($destinationPath), $profileImage);
        $input['image'] = $profileImage;
    } else {
        unset($input['image']);
    }

    $product->update($input);
    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
