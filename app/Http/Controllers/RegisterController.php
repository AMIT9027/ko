<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Models;
use Illuminate\Support\Facades\DB;
use database\migrations\CreateRegisterTable;
class RegisterController extends Controller
{
    public function getData(Request $req)
    {
        //First checking validation or the wrong inputs
        $req->validate([
                        'Email' => 'required|email',
                        'FirstName' =>'required|string|min:3|max:20|',
                        'LastName' => 'required|string|min:3|max:20',
                        'Phone' => 'required|digits:10',
                        'Password' => 'required|min:3'
        ],
        [
                        'Email.required' => 'Required','Email.email' => 'Invalid Email',
                        'FirstName.required' => 'Required','FirstName.string' => 'Must Be String',
                        'LastName.required' => 'Required' , 'LastName.string' => 'Must Be String',
                        'Phone.required' => 'Required' ,'Phone.digits' => 'Must be 10 digit',
                        'Password.required' => 'Required','Password.min'=>'Weak Password'
        ]);
        // Inserting Data into the Register
       $data = $req->input();
        if(Registration::where('Email', '=', $data['Email'])->exists() && Registration::where('Phone','=',$data['Phone'])->exists())
        {
            $req->validate([
                'Email' => 'unique:Registrations',
                'Phone' => 'unique:Registrations'
            ],[
                'Email.unique'=>'Email in use',
                'Phone.unique' => 'Number in use'
            ]);
    }
        else
         {
            DB::table('Registrations')
            ->insert(
                [
                    'FirstName' => $data['FirstName'],
                    'LastName' => $data['LastName'],
                    'Email' => $data['Email'],
                    'CollegeName' => $data['CollegeName'],
                    'Phone' => $data['Phone'],
                    'Password' => $data['Password']
                ]
                );
                return redirect('Register');

         }
    }
    public function SettingSession(Request $req)
    {
        $data = $req->input();
        $req->session()->put('Session_Id',);
    }
}
