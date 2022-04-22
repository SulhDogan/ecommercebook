<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
class AdminController extends Controller
{
    public function login()
    {
        return view("adminlogin");
    }
    public function adminlogin(Request $request){
        $request->validate([
            'Username' => 'required',
            'Password' => 'required|min:6|max:6'
        ]);
        $admin = Admin::where('Username','=',$request->Username)->first();
        if($admin)
        {
            if($admin->Password==$request->Password)
            {
                $request->session()->put('AdminLoginID',$admin->AdminID);
                $request->session()->put('AdminName',$admin->Username);
                return redirect('/panel');
            }
            else
            {
                return back()->with('Başarısız','Şifrenizi Lütfen Kontrol Ediniz.');
            }
        }
        else
        {   
            return back()->with('Başarısız','Bu Kullanıcı İsmine Sahip Bir Admin Bulunamadı');
        }
    }
    public function adminlogout(){
        if(Session::has('AdminLoginID'))
        {
            Session::pull('AdminLoginID');
            return redirect('adminlogin');
        }
    }
    public function panel(){
        $data=array();
        if(Session::has('AdminLoginID'))
        {
            $data=Admin::where('AdminID','=',Session::get('AdminLoginID'))->first();
            
        }
        return view('panel',compact('data'));
    }
}
