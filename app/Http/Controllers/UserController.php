<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'EMail' => 'required|unique:users',
            'Password' => 'required|min:6|max:6',
            'Name' => 'required',
            'Surname' => 'required',
            'Phone' => 'required|unique:users|min:11|max:11',
            'EMailre' => 'required',
            'Passwordre' => 'required'
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
    public function login(Request $request)
    {
        $request->validate([
            'EMail' => 'required',
            'Password' => 'required|min:6|max:6'
        ]);
        $user = Users::where('EMail','=',$request->EMail)->first();
        if($user)
        {
            if($user->Password==$request->Password)
            {
                $request->session()->put('UserLoginID',$user->UserID);
                return redirect('/index');
            }
            else
            {
                return back()->with('Başarısız','Şifrenizi Lütfen Kontrol Ediniz.');
            }
        }
        else
        {   
            return back()->with('Başarısız','Bu Kullanıcı İsmine Sahip Bir Kullanıcı Bulunamadı');
        }
    }
}
