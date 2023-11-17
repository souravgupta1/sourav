<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MailSetting;
use App\Models\PagesModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class UserController extends Controller
{
    function userFormView(){
        $pagesList = PagesModel::all();
        return view('admin.pages.user.create-user',['pages'=>$pagesList]);
    }

    function createUser(Request $request){
        $user = new UserModel();

        $user->role = $request->role;
        $user->name = $request->uname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->pages = implode('|',$request->pages);
        foreach($request->opts as $opt){
            $options[] = implode('|',$opt);
        }
        $user->action = implode(',',$options);
        if($user->save()){
             $lastUserInserted  = UserModel::latest()->first();
            $mail = new MailSetting();
            $mail->user_id = $lastUserInserted->id;
            if($mail->save()){
                return redirect()->route('create-user')->with(['status'=>'User Created Successfully']);
            }

        }else{
            return redirect()->route('create-user')->with(['status'=>'Something went wrong']);
        }
    }
}
