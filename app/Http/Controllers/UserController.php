<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Log;
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
                $request->session()->put('UserName',$user->Name);
                $request->session()->put('UserSurname',$user->Surname);
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
    public function logout(Request $request)
    {
        if($request->session()->has('AdminLoginID'))
        {
            $request->session()->forget('AdminLoginID');
        }
        else
        {

            $request->session()->forget('UserLoginID');
            $request->session()->forget('UserName');
            $request->session()->forget('UserSurname');
        }
        return redirect('/index');
    }
    public function show($id)
    {
        $user=Users::find($id);
        return view('edituser')->with('user',$user);
    }
    public function update(Request $request,$id)
    {
        $user=Users::find($id);
        $input=[
            'EMail'=>$request->EMail,
            'Password'=>$request->Password,
            'Phone'=>$request->Phone
        ];
        $user->update($input);
        return view('index');
    }
}
