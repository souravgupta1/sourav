<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Mail\userMailVerification;
use App\Models\CompanyModel;
use App\Models\MailSetting;
use App\Models\User;
use Illuminate\Support\Facades\Mail;



class AuthController extends Controller
{
    function loginPageView(){
        if(!session()->has('admin')){
            return view('admin.auth.auth-login');
        }else{

            return redirect()->route('dashboard');
        }

    }
    function registerPageView(){
        return view('admin.auth.auth-register');
    }
    function forgetPageView(){
        return view('admin.auth.auth-forgot-password');
    }
    function logout(){
        Session::flush();
        return redirect()->route('login');
    }

    function adminRegistration(Request $request){

            $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin_login,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        $admin = new AdminModel();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        if($admin->save()){
                $user = new User();
                $user->admin_id = $admin->id;
                $user->pages = 'All';
                $user->created_by = $admin->id;
                if(!$user->save()){
                    return redirect()->route('register')->with('error','Something went worng with.');
                }
            $mail = new MailSetting();
            $mail->user_id = $admin->id;

            if($mail->save()){
                if($this->sendMail($admin)){

                    return redirect()->route('login')->with('message','Verification is Pending Please check your Mail');
                }else{
                    return redirect()->route('register')->with('error','Mail Not Send');
                }
            }else{
                 return redirect()->route('register')->with('error','Something went worng');
            }
        }else{
            return redirect()->route('register')->with('error','Something went worng');
        }
    }

     function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $admin = AdminModel::where('email',$request->email)->first();

        if ($admin){
            $company = CompanyModel::where('user_id',$admin->id)->first();
            if(Hash::check($request->password, $admin->password)){
                if (!$admin->Is_verify) {
                    return redirect()->back()->withInput()->with('error','Email is not verified');
                }else{
                    if($company){
                        session(['admin' => $admin,'company'=>$company]);
                    }else{
                        session(['admin' => $admin]);
                    }

                    return redirect()->route('dashboard');
                }
            }else{
                return redirect()->back()->withInput()->with('error','Invalid login credentials');
            }
        }else{
            return redirect()->back()->withInput()->with('error','Email is not registered');
        }
    }
   public function sendMail(AdminModel $admin){


        $data = array('name'=>$admin->name,'verificationUrl'=>url("/admin/verifyUser/$admin->id"));
        Mail::to($admin->email)->send(new userMailVerification($data));

        return true;
    }

    function verifyUser($id){
        $user = AdminModel::find($id);
        if($user){
            $user->Is_verify =1;
            if($user->save()){
                return redirect()->route('login')->with('message', 'Email Verified');
            }
        }else{
            return redirect()->route('login')->with('message', 'Link Expire Please check for New Mail');
        }

    }
}
