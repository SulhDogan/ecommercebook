<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'EMail'=>'required|unique:Users',
            'Password'=>'required|min:6|max:6',
            'Name'=>'required',
            'Surname'=>'required',
            'Phone'=>'required|unique:Users|min:11|max:11',
            'EMailre'=>'required',
            'Passwordre'=>'reqired'
        ]);
        if ($request->Password==$request->Passwordre && $request->EMail==$request->EMailre)
        {

            $user= new Users();
            $user->Name=$request->Name;
            $user->Surname=$request->Surname;
            $user->Phone=$request->Phone;
            $user->EMail=$request->EMail;
            $user->Password=$request->Password;
            $res=$user->save();
            if($res)
            {
                return back()->with('Başarılı','Kullanıcı Oluşturuldu');
            }
            else
            {
                return back()->with('Başarısız','Kullanıcı Oluşturulmadı');
            }
        }
        else
        return back()->with('Başarısız','Email ve şifre tekrarını kontrol edin');

    }
}
