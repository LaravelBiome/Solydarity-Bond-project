<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Commande;
use Auth;
use Gate;
use Storage;
use File;
use App\Category;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verified' , ['except' => ['index' , 'show' , 'search' , 'ShowCategory' , 'MyProducts']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::All();
        $products = Product::orderBy('created_at' , 'DESC')->paginate(9);
        return view('products.index')->with('products' , $products)
                                     ->with('categories',  $categories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();

        if(Gate::allows('seller-only'))
              return view('products.create')->with('categories' , $categories);

        else
            return view('errors.refused');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('seller-only'))
             return view('errors.refused');

        $request->validate([
            'name' => ['required', 'alpha_num' , 'string' , 'max:255'],
            'description' => ['required' , 'string' , 'min:5' , 'max:500'],
            'price' => ['required' , 'numeric'],
            'quantity' => ['required' , 'numeric'],
            'image' => ['required' , 'image'],
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->id_user = Auth::user()->id;
        $product->visible = 1;
        $product->id_category = $request->input('category');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->put($filename,  File::get($image));
            $product->image = $filename;
          };

        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::Find($id);

        if($product === NULL)
              return view('errors.404');

        return view('products.show')->with('product' , $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::Find($id);

        if($product === NULL)
             return view('errors.404');

        if(Gate::allows('update-product' , $product))
            return view('products.edit')->with('product' , $product);

        return view('errors.refused');
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
        $product = Product::Find($id);

        if($product === NULL)
               return view('errors.404');

        if(Gate::denies('update-product' , $product))
             return view('errors.refused');


            $request->validate([
                'name' => ['required',  'string' , 'max:255'],
                'description' => ['required' , 'string' , 'min:5' , 'max:500'],
                'price' => ['required' , 'numeric'],
                'quantity' => ['required' , 'numeric']
            ]);

            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->id_user = Auth::user()->id;
            $product->visible = 1;


            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put($filename,  File::get($image));
                $product->image = $filename;
              };

            $product->save();

            return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::Find($id);

        if($product === NULL)
             return view('errors.404');

        if(Gate::allows('delete-product' , $product))
        {
            $commandes = Commande::where('id_product',  $product->id);

            foreach($commandes as $commande)
            {
                $commande->delete();
            }


            $product->delete();
            return redirect('/products');
        }

        else
            return view('errors.refused');
    }


    public function search(Request $request){


        $search = $request->search;
        $categorries = Category::all();
        if($search == '')
        {
            $categories = Category::orderby('id','asc')->limit(5)->get();
            $products = Product::orderBy('created_at', 'DESC')->get();
        }
        else
        {
           $products = Product::orderby('name','asc') ->where('name', 'like', '%' .$search . '%')
                                                        ->limit(5)->get();

           $categories = Category::orderby('name','asc') ->where('name', 'like', '%' .$search . '%')
                                                        ->limit(5)->get();
        }


        $response = array();


        foreach($products as $product)
           $response[] = array("label" => $product->name , "id"=>$product->id,"name"=>$product->name , "type"=>0);

        foreach($categories as $category)
           $response[] = array("label" => $category->name , "id"=>$category->id,"name"=>$category->name , "type"=>1);

        if($request->ajax())
         return  json_encode($response);

        return view('products.search')->with('products',$products)
                                      ->with('search', $search)
                                      ->with('categories' , $categorries) ;
     }


     public function ShowCategory($name)
     {

        $category = Category::where('name' , $name)->first();
        $categorries = Category::all();

        if($category === NULL)
             return view('errors.404');

        $products = Product::where('id_category' , $category->id)->get();

        return view('products.searchcategory')->with('products',$products)
                                                ->with('categor', $name)
                                                ->with('categories',$categorries) ;
     }

     public function MyProducts()
     {
            if(Gate::denies('seller-only'))
              return view('errors.404');


            $products = Product::where('id_user' , Auth::user()->id)->get();
            return view('products.my_products')->with('products' , $products);
     }
}

