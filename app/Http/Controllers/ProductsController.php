<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\PictureProduct;
use App\Product;
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
        $this->middleware('bde',['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        $productList = Product::SortProductDesc()->get();
        return view('products.index', compact('productList'));
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
        // get the extension
        $mime = $img->mime();
        $mime = explode("/", $mime);
        // save the product
        $product = Product::create($request->all());
        // get the id of the product saved
        $product_id = Product::ProductId()->id;
        // save in the database the image associed to the product
        PictureProduct::create(['product_id' => $product_id]);
        // get the id of the image associed to the product
        $image_id = PictureProduct::PictureId()->id;
        // save the image with the size and the name
        $img->resize(300, 200)->save('img/products/' . $image_id . '.' . $mime[1]);
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
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
