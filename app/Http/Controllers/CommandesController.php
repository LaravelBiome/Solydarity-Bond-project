<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gate;
use App\Commande;
use Auth;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if(Gate::denies('seller-only'))
                 return view('errors.refused');

                $commandes = Commande::all();
                $finalCommandes;
                $i = 0;

                foreach($commandes as $commande)
                {
                    $product = Product::find($commande->id_product);

                    if($product->id_user != Auth::user()->id)
                        unset($commandes[$i]);

                    $i++;
                }

                return view('commandes.index')->with('commandes' , $commandes);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);

            if($product === NULL)
               return view('errors.404');
        
        if(Gate::allows('buy-product' , $product))
          return view('commandes.create')->with('product' , $product);
          
        

        else 
            return view('errors.refused');
    }



    public function achats()
    {
        if(Gate::denies('achats'))
            return view('errors.refused');


        $achats = Commande::where('id_buyer' , Auth::user()->id)->orderby('created_at' , 'DESC')->get();
        return view('commandes.achats')->with('achats' , $achats);
    }

    public function achatsItem($id)
    {
        if(Gate::denies('achats'))
            return view('errors.refused');


        $achats = Commande::where('id_buyer' , Auth::user()->id)->orderby('created_at' , 'DESC')->get();
        return view('commandes.achats')->with('achats' , $achats)->item('item' , $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        
        $product = Product::find($id);

            if($product === NULL)
              return view('errors.404');  

            if(Gate::denies('buy-product' , $product))
                return view('errors.refused');

        $doesExist = Commande::where('id_buyer' , Auth::user()->id)->where('id_product' , $id)->first();
        $achats = Commande::where('id_buyer' , Auth::user()->id)->orderby('created_at' , 'DESC')->get();

        if($doesExist === NULL)
        {
        
        $commande = new Commande;
        $commande->id_product = $id;
        $commande->id_buyer = Auth::user()->id;
        $commande->quantity = $request->input('quantity');
        $commande->description = $request->input('description');
        $commande->save();


        /*if(Gate::denies('achats'))
            return view('commandes.achats')->with('achats' , $achats);


        return view('commandes.achats')->with('achats' , $achats)->with('item' , $commande->id);
        }*/

        return redirect('achats');

        }

        else 
        {
            //return view('commandes.achats')->with('achats' , $achats)->with('item' , $doesExist->id);
            return redirect('achats')->with('item' , $doesExist->id);
        }

        
    

        

        

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

    public function buy(Request $request , $id)
    {
        
    }

    public function hehe()
    {
        if(Gate::denies('seller-only'))
              return view('errors.404');


        $achats = Commande::where('id_buyer' , Auth::user()->id)->get();
        return view('commandes.achats')->with('achats' , $achats)->with('item' , 3);
    }
}
