<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;


class ProfileController extends Controller
{
    public function edit()
    {
        if(Auth::user()){
            $profile = User::where('id' , '=' , Auth::user()->id)->get();
            if ($profile) {
                return view('profile.edit')->with('profile' , $profile);
            }else{
                return redirect()->back() ;
            }
        }else {
            return redirect()->back() ;
        }
    }

    public function update(Request $request) 
    {
        $profile = User::find(Auth::user()->id);

        if($profile === NULL)
            return view('errors.404');

       
         $request->validate([
                'firstname' => ['required', 'alpha' , 'string', 'max:100'],
                'lastname' => ['required', 'string', 'alpha', 'max:100'],
                'phone' => ['phone:DZ'],
            ]);

            if($request->input('old_password') !== NULL)
            {
                $hash = Auth::user()->getAuthPassword();

                if(Hash::check($request->input('old_password') , $hash))
                {
                    if($request->input('password') === NULL)
                         return redirect('/edit/profile');

                    $request->validate([
                        'password' => ['required', 'string', 'min:8', 'confirmed']
                    ]);

                    $profile->password = Hash::make($request->input('password'));
                }

                else 
                     return view('profile.edit')->with('old_password_error' , "L'ancient mot de passe est incorrecte.");
                

            }
            

            $profile->firstname = $request['firstname'] ;
            $profile->lastname = $request['lastname'] ;
            $profile->phone = $request['phone'];
            $profile->email = $request['email'];
            $profile->save();

            return redirect('/edit/profile');
    }
}
