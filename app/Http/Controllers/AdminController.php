<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;
use Auth;
use App\Product;
use App\Commande;
use App\Inscription;

class AdminController extends Controller
{
    public function Users()
    {
        if(Gate::allows('admin-only'))
        {
            $users = User::where('id' , '!=' , Auth::user()->id)->get();
             return view('admin.users')->with('users' , $users);
        }

        else
          return view('errors.refused');
    }

   public function EditUser($id)
   {
       if(Gate::denies('admin-only'))
            return view('errors.refused');

       $user = User::find($id);

       if($user === NULL)
             return view('errors.404');

       //return view('admin.edituser')->with('user' , $user);
       return redirect('/admin/users');
   }

   public function UpdateUser(Request $request , $id)
   {
        if(Gate::denies('admin-only'))
                return view('errors.refused');

        $user = User::find($id);

        if($user === NULL)
               return view('errors.404');

        $user->right = $request->input('right');
        $user->save();

        return redirect('/admin/users/' . $user->id);
   }


   public function DestroyUser($id)
   {
    if(Gate::denies('admin-only'))
        return view('errors.refused');

        $user = User::find($id);

        if($user === NULL)
             return view('errors.404');


        $products = Product::where('id_user' , $id)->get();
        foreach($products as $product)
        {
            $commandes = Commande::where('id_product',  $product->id);
            
            foreach($commandes as $commande)
            {
                $commande->delete();
            }

            $product->delete();
        }

        $inscriptions = Inscription::where('id_user' , Auth::user()->id)->get();

        foreach($inscriptions as $inscription)
            $inscription->delete();

        $user->delete();
        return redirect('/admin/users');
   }


   public function inscriptions()
   {
        if(Gate::denies('admin-only'))
              return view('errors.refused');

        $inscriptions = Inscription::all();
        return view('admin.inscriptions')->with('inscriptions' , $inscriptions);
   }

   public function deleteInscription($id)
   {
        if(Gate::denies('admin-only'))
            return view('errors.refused');

            $inscription = Inscription::find($id);

            if($inscription === NULL)
                 return view('errors.404');

        $inscription->delete();
        return redirect('/admin/inscriptions');
   }

   public function accepetInscription(Request $request , $id)
   {
        if(Gate::denies('admin-only'))
            return view('errors.refused');

        $inscription = Inscription::find($id);

        if($inscription === NULL)
             return view('errors.404');

        if($request->input('right') == 2)
        {
            $user = User::find($inscription->id_user);
                if($user === NULL)
                     return view('errors.404');

            $user->right = 2;
            $user->save();
            $inscription->delete();
        }


        return redirect('/admin/inscriptions');
   }
}
