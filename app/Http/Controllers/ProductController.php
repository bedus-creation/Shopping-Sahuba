<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Price;
use App\Http\Requests\Product\EditRequest;
use App\Models\Category;


class ProductController extends Controller
{

    protected $repository;

    public function __construct(Product $repository){

        $this->repository = $repository;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->repository->where('user_id',auth()->user()->id)->get();
        return view('bend.product.index',['data'=>$data]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('bend.product.create',compact('categories'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $price=Price::create([
            'type'=>'fixed',
            'min'=>$request->price,
        ]);
        
        date_default_timezone_set('Asia/Kathmandu');
        $date = date('Y-m-d');
        $date = date('Y-m-d', strtotime($date. ' + 90 days'));

        $request->merge([
            'price_id'=>$price->id,
            'user_id'=>auth()->user()->id,
            'expiry_date'=>$date
        ]);
        $product=$this->repository->create($request->all());

        $product->medias()->attach(explode(',',$request->media_id));
            
        return redirect()->back()->with('success','Your Product Is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $this->authorize('update',$product);

        $categories = Category::all();

        $data= $product->load('medias')->load('price');

        return view('bend.product.edit', ['product'=>$data,'categories'=>$categories]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Product $product)
    {
        $this->authorize('update',$product);

        Price::find($product->id)->update([
            'type'=>'fixed',
            'min'=>$request->price,
        ]);

        $date = date('Y-m-d');
        $date = date('Y-m-d', strtotime($date. ' + 30 days'));

        $request->merge([
            'user_id'=>auth()->user()->id,
            'expiry_date'=>$date
        ]);

        $product->update($request->all());

        $product->medias()->sync(explode(',',$request->media_id));

        return redirect()->back()->with('success', 'edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('update',$product);

        $product->delete();

        return redirect()->back()->with('success', 'Product Deleted successfully');
    }
}
