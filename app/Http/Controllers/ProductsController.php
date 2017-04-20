<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\PictureProduct;
use App\Product;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('cesiOuBde', ['only' => ['create', 'store']]);
        $this->middleware('cesi',['except' => ['create', 'store', 'index']]);

    }

    public function index()
    {
        $productList = Product::SortProductDesc()->get();
        foreach ($productList as $product){
            $imageList[$product->id] = Product::findOrFail($product->id)->picture;
        }
        return view('products.index', compact('productList', 'imageList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = CategoryProduct::SortCategoriesProductDesc()->pluck('name', 'id')->all();
        return view('products.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get the image from the form
        $img = Image::make(Input::file('image'));
        // save the product
        $product = Product::create($request->all());
        // get the id of the product saved
        $product_id = Product::ProductId()->id;
        // save in the database the image associed to the product
        PictureProduct::create(['product_id' => $product_id]);
        // get the id of the image associed to the product
        $image_id = PictureProduct::PictureId()->id;
        // save the image with the size and the name
        $img->resize(300, 200)->save('img/products/' . $image_id . '.PNG');
        return redirect(route('products.show',$product));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $imageList[$id] = Product::findOrFail($id)->picture;
        return view('products.show', compact('product', 'imageList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categoryList = CategoryProduct::SortCategoriesProductDesc()->pluck('name', 'id')->all();
        return view('products.edit', compact('product', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $images = Product::findOrFail($id)->picture;
        foreach ($images as $image){
            if(isset($image)){
                File::delete('img/products/' . $image->id . '.PNG');
            }
        }
        $product->delete();
        return redirect(route('products.index'));
    }
}
