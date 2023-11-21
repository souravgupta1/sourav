<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\MailSetting;
use App\Models\PagesModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Svg\Tag\Rect;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    function userFormView(){
        $pagesList = PagesModel::all();
        return view('admin.pages.user.create-user',['pages'=>$pagesList]);
    }

    function createUser(Request $request){
        $user = new UserModel();
        $admin = new AdminModel();
        $auth = new AuthController();


      try{
        $request->validate([
            'role'=>'required',
            'uname'=>'required',
            'email'=>'required|email|unique:admin_login,email',
            'password'=>'required',
            'pages'=>'required',
            'opts'=>'required',
        ]);

      } catch (ValidationException $e) {
         $e->validator->errors()->all();
        foreach($e->errors() as $key=>$value){
             return redirect()->route('create-user')->with(['error'=>$value[0]])->withInput();;
             break;
        }


      }
        $admin->role = $request->role;
        $admin->name = $request->uname;
        $admin->email = $request->email;

        $admin->password = Hash::make($request->password);
        if($admin->save()){
            $mail = new MailSetting();
            $mail->user_id = $admin->id;
            $user->admin_id = $admin->id;
            $user->pages = implode('|',$request->pages);
            if(session('admin')){
                $user->created_by = session('admin')->id;
            }
            foreach($request->opts as $opt){
                $options[] = implode('|',$opt);
            }
            $user->action = implode(',',$options);
            if($mail->save()){
                if($auth->sendMail($admin)){
                    if(!$user->save()){
                    return redirect()->route('create-user')->with(['error'=>'Error in user Insertion']);
                }
                     return redirect()->route('create-user')->with(['warning'=>'Please Verify Email ID']);
                }else{
                    return redirect()->route('create-user')->with('error','Mail Not Send');
                }
            }else{
                 return redirect()->route('create-user')->with('error','Error in Mail Insertion');
            }
        }else{
            return redirect()->route('create-user')->with('error','Error in Owner Insertion');
        }




    }
    function userListView(){

        $users = UserModel::Join('admin_login', 'users.admin_id', '=', 'admin_login.id')
        ->where('users.created_by', session('admin')->id)
        ->select(
            'admin_login.id as admin_table_id',
            'users.id as user_table_id',
            'admin_login.*',
            'users.*'
        )->get();

        return view('admin.pages.user.user-list',compact('users'));
    }
}
