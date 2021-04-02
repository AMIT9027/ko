<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Registration;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function GetData(Request $req){
        
        $req->validate([
            'Email' => 'required|email',
            'Password' => 'required'
        ],[       
            'Email.required' => 'Cannot Be Empty',
            'Email.email' => 'Invalid Email',
            'Password.required' => 'Cannot Be Empty'
            ]);

        $data = $req->input();
        $val  = Registration::where('Email','=',$data['Email'])->exists();
        if($val == 0)
        {
            $req->validate([
                'Email' => 'unique:registrations'
            ],[
                'Email.unique' => 'Invalid Email'
            ]);
        }
        else
        {
            $id = Registration::where('Email', '=',$data['Email'])->get('id');
            $alldata = Registration::where('id','=',$id['0']['id'])->get('Password');
                    
            if($data['Password'] != $alldata['0']['Password'])
             {       
                return redirect('login');
             }
            else
            {
                $req->session()->put('Login_ID',$id['0']['id']);
                return redirect('profile');
            }

        }
    }

}